<?php

namespace App\Console\Commands;

use Elegantly\Translator\Facades\Translator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class CheckMissingTranslationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-missing-translations
        {locales=en : The locales to check for missing translations, comma separated}
        {--all : Check all locales}
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check for missing translations in specified locales';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        Config::set('translator.services.openai.key', 'api-key-not-needed');

        $locals = collect(explode(',', $this->argument('locales')))
            ->when($this->option('all'), fn ($c) => $c->merge(Translator::getLocales()))
            ->unique()
            ->values();

        $ok = true;

        foreach ($locals as $locale) {

            $missing = collect(Translator::getMissingTranslations($locale))
                ->map(fn ($item): array => [
                    'count' => count($item['files']),
                    'files' => $item['files'],
                ]);

            if ($missing->isEmpty()) {
                $this->info("No missing translations for locale '{$locale}'.");

                continue;
            }

            $this->info("Missing translations for locale '{$locale}':");
            $this->table(
                ['Key', 'Count', 'Files'],
                $missing->map(fn ($item, $key): array => [
                    $key,
                    $item['count'],
                    implode(', ', $item['files']),
                ])
            );

            $ok = false;
        }

        return $ok ? Command::SUCCESS : Command::FAILURE;
    }
}
