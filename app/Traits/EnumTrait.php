<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait EnumTrait
{
    /**
     * Convert enum cases to a collection.
     *
     * @return Collection<int, array{value: string, label: string, description: string|null, color: string|null, lucideIcon: string|null}>
     */
    public static function toCollection(): Collection
    {
        /** @phpstan-ignore-next-line */
        return collect(self::cases())->map(function (self $case): array {
            return [
                'value' => $case->value,
                'label' => $case->label(),
                /** @phpstan-ignore-next-line */
                'description' => method_exists($case, 'description') ? $case->description() : null,
                /** @phpstan-ignore-next-line */
                'color' => method_exists($case, 'color') ? $case->color() : null,
                /** @phpstan-ignore-next-line */
                'lucideIcon' => method_exists($case, 'lucideIcon') ? $case->lucideIcon() : null,
            ];
        })->values();
    }

    /**
     * Pluck enum case values in a [ value => label ] format.
     *
     * @return Collection<string, string>
     */
    public static function pluck(): Collection
    {
        return collect(self::cases())->mapWithKeys(fn (self $case): array => [
            $case->value => $case->label(),
        ]);
    }
}
