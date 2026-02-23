<?php

namespace App\Collectors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\DocBlockFactory;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Boolean;
use phpDocumentor\Reflection\Types\Compound;
use phpDocumentor\Reflection\Types\ContextFactory;
use phpDocumentor\Reflection\Types\Float_;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Null_;
use phpDocumentor\Reflection\Types\Object_;
use phpDocumentor\Reflection\Types\String_;
use ReflectionClass;
use Spatie\TypeScriptTransformer\Collectors\Collector;
use Spatie\TypeScriptTransformer\Structures\MissingSymbolsCollection;
use Spatie\TypeScriptTransformer\Structures\TransformedType;

class AppCollector extends Collector
{
    /** @var array<class-string> */
    public static array $supportedTypes = [
        Model::class,
        JsonResource::class,
    ];

    /**
     * @param  ReflectionClass<object>  $class
     */
    public function getTransformedType(ReflectionClass $class): ?TransformedType
    {
        if (collect(self::$supportedTypes)->doesntContain(fn (string $supportedType): bool => $class->isSubclassOf($supportedType))) {
            return null;
        }

        return $this->transform($class);
    }

    /**
     * @param  ReflectionClass<object>  $class
     */
    protected function transform(ReflectionClass $class): ?TransformedType
    {
        $docComment = $class->getDocComment();
        if (! $docComment) {
            return null;
        }

        $factory = DocBlockFactory::createInstance();
        $context = (new ContextFactory)->createFromReflector($class);
        $docBlock = $factory->create($docComment, $context);

        $missingSymbols = new MissingSymbolsCollection;
        $hidden = $class->isSubclassOf(Model::class)
            ? $class->getProperty('hidden')->getValue($class->newInstanceWithoutConstructor())
            : [];
        $properties = [];

        foreach ($docBlock->getTagsByName('property') as $tag) {
            /** @var \phpDocumentor\Reflection\DocBlock\Tags\Property $tag */
            $name = $tag->getVariableName();

            if (in_array(ltrim($name, '$'), $hidden, true)) {
                continue;
            }

            // Resolve the type and capture any required imports (Enums/Classes)
            $tsType = $this->resolveType($tag->getType(), $missingSymbols);

            // Make nullable types optional in TS (e.g. name?: string)
            $isNullable = str_contains($tsType, 'null');
            $key = $isNullable ? "$name?" : $name;

            $properties[] = "$key: $tsType;";
        }

        return new TransformedType(
            $class,
            $class->getShortName(), // Will become "export type User"
            "{ \n".implode("\n", $properties)."\n}",
            $missingSymbols,
            false,
        );
    }

    private function resolveType(?Type $type, MissingSymbolsCollection $missingSymbols): string
    {
        if (! $type instanceof \phpDocumentor\Reflection\Type) {
            return 'null';
        }

        if ($type instanceof \phpDocumentor\Reflection\Types\Nullable) {
            return $this->resolveType($type->getActualType(), $missingSymbols).' | null';
        }

        if ($type instanceof \phpDocumentor\Reflection\Types\Mixed_) {
            return '(string|number|boolean|null)';
        }

        if ($type instanceof Compound) {
            return implode(' | ', array_map(
                fn (\phpDocumentor\Reflection\Type $t): string => $this->resolveType($t, $missingSymbols),
                iterator_to_array($type)
            ));
        }

        if ($type instanceof Array_) {
            return $this->resolveType($type->getValueType(), $missingSymbols).'[]';
        }

        if ($type instanceof Null_) {
            return 'null';
        }
        if ($type instanceof String_) {
            return 'string';
        }
        if ($type instanceof Integer || $type instanceof Float_) {
            return 'number';
        }
        if ($type instanceof Boolean) {
            return 'boolean';
        }

        if ($type instanceof Object_) {
            $fqsen = ltrim((string) $type->getFqsen(), '\\');

            // 1. Check Config Replacements (e.g. Carbon -> string)
            $replacements = $this->config->getDefaultTypeReplacements();
            if (isset($replacements[$fqsen])) {
                return $replacements[$fqsen];
            }

            // 2. If it's a known class/enum, register it for Import
            if (class_exists($fqsen) || interface_exists($fqsen) || enum_exists($fqsen)) {
                $missingSymbols->add($fqsen);
                $parts = explode('\\', $fqsen);

                return implode('.', $parts);
            }
        }

        throw new \Exception('Unsupported type: '.get_class($type));
    }
}
