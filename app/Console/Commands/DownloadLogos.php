<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class DownloadLogos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'download:logos {file=storage/data/universities.json} {--path=logos}';

    protected $description = 'Parse a JSON file and download logos to public storage';

    public function handle()
    {
        $filePath = $this->argument('file');
        $subFolder = $this->option('path');

        // 1. Check if the JSON file exists
        if (!File::exists(base_path($filePath))) {
            $this->error("JSON file not found at: " . base_path($filePath));
            return;
        }

        // 2. Parse the JSON
        $jsonContent = File::get(base_path($filePath));
        $items = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->error("Invalid JSON format in {$filePath}");
            return;
        }

        $this->info("📂 Loading data from: {$filePath}");
        $this->info("💾 Destination: public/{$subFolder}/");

        $bar = $this->output->createProgressBar(count($items));
        $bar->start();

        foreach ($items as $item) {
            $englishName = $item['name']['en'] ?? 'unknown';
            $url = $item['logo_url'] ?? null;

            if (!$url) {
                continue;
            }

            $hash = hash('sha256', Str::lower(trim($englishName)));
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
            $fileName = "{$subFolder}/{$hash}.{$extension}";

            try {
                $response = Http::timeout(20)->get($url);

                if ($response->successful()) {
                    $publicPath = public_path($fileName);
                    File::ensureDirectoryExists(dirname($publicPath));
                    File::put($publicPath, $response->body());
                }
            } catch (\Exception $e) {
                $this->error("\nFailed to download {$englishName}: " . $e->getMessage());
            }

            $bar->advance();
        }

        $bar->finish();
        $this->info("\n\n✨ Process complete. Images are in: " . public_path($subFolder));
    }
}
