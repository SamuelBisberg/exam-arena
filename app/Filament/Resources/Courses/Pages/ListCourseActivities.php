<?php

namespace App\Filament\Resources\Courses\Pages;

use App\Filament\Resources\Courses\CourseResource;
use pxlrbt\FilamentActivityLog\Pages\ListActivities;

class ListCourseActivities extends ListActivities
{
    protected static string $resource = CourseResource::class;
}
