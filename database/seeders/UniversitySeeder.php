<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect($this->getUniversities())
            ->each(
                fn (array $University) => University::firstOrCreate([
                    'slug' => Str::slug($University['name']['en']),
                ], [
                    'name' => $University['name'],
                    'website_url' => $University['website_url'] ?? null,
                    'logo_path' => 'images/Universities/logos/'.hash('sha256', Str::lower(trim($University['name']['en']))).'.'.Str::afterLast($University['logo_url'], '.'),
                    'country' => 'Israel',
                ])
            );
    }

    protected function getUniversities(): array
    {
        $path = storage_path('data/universities.json');

        if (! file_exists($path)) {
            throw new \RuntimeException("University seed file not found: {$path}");
        }

        $contents = file_get_contents($path);
        $data = json_decode($contents, associative: true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException('Failed to parse universities.json: '.json_last_error_msg());
        }

        return $data;
    }
}
