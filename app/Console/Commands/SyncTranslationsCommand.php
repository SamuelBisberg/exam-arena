<?php

namespace App\Console\Commands;

use Elegantly\Translator\Facades\Translator;
use Illuminate\Console\Command;

class SyncTranslationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-translations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync translation keys for the default locale';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // $current = collect(Translator::getTranslations('en'));
        $translations = collect(Translator::getMissingTranslations('en'))
            ->keys()
            ->mapWithKeys(fn (string $key): array => [$key => $key]);

        Translator::setTranslations('en', $translations->toArray());
        Translator::sortTranslations(locale: 'en');

        $this->info('Translations synced for the default locale (en).');
    }
}
