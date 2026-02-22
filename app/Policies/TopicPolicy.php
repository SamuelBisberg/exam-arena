<?php

namespace App\Policies;

use App\Enums\TopicStatusEnum;
use BackedEnum;

class TopicPolicy extends ContentPolicy
{
    static BackedEnum|string $contentVisibleStatus = TopicStatusEnum::ACTIVE;

    static BackedEnum|string $statusActiveValue = 'topic_status';
}
