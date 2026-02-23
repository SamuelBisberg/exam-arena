<?php

namespace App\Models;

use App\Traits\HasLogsActivityWithDefaultOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

/**
 * @property int $id
 * @property string $name
 * @property string $short_name
 * @property string $slug
 * @property string|null $logo_path
 * @property string|null $country
 * @property string|null $website_url
 * @property string|null $description
 */
class University extends Model
{
    use HasLogsActivityWithDefaultOptions, HasTranslations;

    protected $fillable = [
        'name',
        'short_name',
        'logo_path',
        'slug',
        'country',
        'website_url',
        'description',
    ];

    public array $translatable = ['name', 'short_name'];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
