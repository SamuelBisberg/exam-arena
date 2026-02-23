<?php

namespace App\Policies;

use App\Enums\TopicStatusEnum;
use BackedEnum;

class TopicPolicy extends ContentPolicy
{
    public static BackedEnum|string $contentVisibleStatus = TopicStatusEnum::ACTIVE;

    public static BackedEnum|string $statusActiveValue = 'topic_status';
}
