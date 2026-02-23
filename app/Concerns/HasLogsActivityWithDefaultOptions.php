<?php

namespace App\Concerns;

use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Provides activity logging with sensible defaults for models.
 *
 * Automatically logs changes to fillable attributes, with optional additional
 * fields via the ActivitylogAdditionalFields property. Only logs dirty attributes
 * and skips empty log entries.
 */
trait HasLogsActivityWithDefaultOptions
{
    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName(strtolower(class_basename($this)))
            ->logOnly(
                is_array($this->ActivitylogAdditionalFields ?? null)
                    ? array_merge($this->fillable, $this->ActivitylogAdditionalFields)
                    : $this->fillable
            )
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs();
    }
}
