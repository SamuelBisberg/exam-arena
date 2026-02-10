<?php

namespace App\Models;

use App\Enums\CourseActivityStatusEnum;
use App\Enums\CourseLevelEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

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
}
