<?php

namespace App\Models;

use App\Enums\SemesterEnum;
use App\Enums\SessionEnum;
use App\Enums\VisibilityStatusEnum;
use App\Traits\HasLogsActivityWithDefaultOptions;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $course_id
 * @property string $questionnaire_identifier
 * @property SessionEnum $session
 * @property SemesterEnum $semester
 * @property int $year
 * @property string $yearAndSemester
 * @property \Illuminate\Support\Carbon $exam_date
 * @property VisibilityStatusEnum $visibility_status
 * @property int $total_pages
 * @property int $total_questions
 * @property int|null $duration_minutes
 * @property string|null $instructions
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read ?Course $course
 */
class Exam extends Model
{
    /** @use HasFactory<\Database\Factories\ExamFactory> */
    use HasFactory, HasLogsActivityWithDefaultOptions;

    protected $fillable = [
        'questionnaire_identifier',
        'session',
        'semester',
        'year',
        'exam_date',
        'visibility_status',
        'duration_minutes',
        'total_pages',
        'total_questions',
        'instructions',
        'course_id',
    ];

    protected $casts = [
        'visibility_status' => VisibilityStatusEnum::class,
        'semester' => SemesterEnum::class,
        'session' => SessionEnum::class,
        'exam_date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function yearAndSemester(): Attribute
    {
        return Attribute::make(
            get: fn (): string => "{$this->year}{$this->semester->label()}",
            set: fn ($value): array => [
                'year' => substr($value, 0, 4),
                'semester' => SemesterEnum::from(substr($value, 4)),
            ]
        );
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
