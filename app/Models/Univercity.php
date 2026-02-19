<?php

namespace App\Models;

use App\Concerns\HasLogsActivityWithDefaultOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Univercity extends Model
{
    use HasLogsActivityWithDefaultOptions, HasTranslations;

    protected $fillable = [
        'name',
        'short_name',
        'logo_path',
        'city',
        'website_url',
        'description',
    ];

    public array $translatable = ['name', 'short_name'];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
