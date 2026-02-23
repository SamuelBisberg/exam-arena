<?php

namespace App\Models;

use App\Concerns\HasLogsActivityWithDefaultOptions;
use App\Enums\CourseActivityStatusEnum;
use App\Enums\CourseLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory, HasLogsActivityWithDefaultOptions, InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'course_code',
        'level',
        'activity_status',
    ];

    protected $casts = [
        'level' => CourseLevelEnum::class,
        'activity_status' => CourseActivityStatusEnum::class,
    ];

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->useFallbackPath(public_path('images/default-course-image.png'))
            ->singleFile()
            ->registerMediaConversions(function (Media $media): void {
                $this->addMediaConversion('thumb')
                    ->fit(Fit::Crop, 200, 100)
                    ->sharpen(10);
            });
    }

    public function univercity()
    {
        return $this->belongsTo(Univercity::class);
    }

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
