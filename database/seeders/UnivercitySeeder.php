<?php

namespace Database\Seeders;

use App\Models\Univercity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnivercitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect($this->getUnivercities())
            ->each(
                fn (array $univercity) => Univercity::firstOrCreate([
                    'slug' => Str::slug($univercity['name']['en']),
                ], [
                    'name' => $univercity['name'],
                    'website_url' => $univercity['website_url'] ?? null,
                    'logo_path' => 'images/univercities/logos/'.hash('sha256', Str::lower(trim($univercity['name']['en']))).'.'.Str::afterLast($univercity['logo_url'], '.'),
                    'country' => 'Israel',
                ])
            );
    }

    protected function getUnivercities(): array
    {
        return json_decode(file_get_contents(storage_path('data/univercities.json')), associative: true);
    }
}
