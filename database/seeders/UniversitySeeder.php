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
        return json_decode(file_get_contents(storage_path('data/universities.json')), associative: true);
    }
}
