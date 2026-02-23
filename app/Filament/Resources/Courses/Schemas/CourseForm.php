<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Enums\CourseActivityStatusEnum;
use App\Enums\CourseLevelEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->columnSpan(2),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('course_code')
                    ->required(),
                Select::make('level')
                    ->options(CourseLevelEnum::pluck())
                    ->required(),
                Select::make('activity_status')
                    ->options(CourseActivityStatusEnum::pluck())
                    ->default(CourseActivityStatusEnum::ACTIVE->value)
                    ->required(),
                Select::make('created_by')
                    ->relationship('createdBy', 'name')
                    ->searchable()
                    ->preload()
                    ->getOptionLabelFromRecordUsing(fn ($record): string => $record->name.' ('.$record->email.')')
                    ->default(Auth::user()->getKey())
                    ->required(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image'),
            ]);
    }
}
