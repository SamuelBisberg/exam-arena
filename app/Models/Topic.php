<?php

namespace App\Models;

use App\Enums\TopicStatusEnum;
use App\Traits\HasLogsActivityWithDefaultOptions;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property TopicStatusEnum $topic_status
 * @property int $course_id
 * @property int $order_column
 */
class Topic extends Model implements Sortable
{
    /** @use HasFactory<\Database\Factories\TopicFactory> */
    use HasFactory, HasLogsActivityWithDefaultOptions, SortableTrait;

    protected $fillable = [
        'name',
        'description',
        'topic_status',
        'course_id',
    ];

    protected $casts = [
        'topic_status' => TopicStatusEnum::class,
    ];

    protected $ActivitylogAdditionalFields = [
        'order_column',
    ];

    public function buildSortQuery(): Builder
    {
        return self::query()->where('course_id', $this->course_id);
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
