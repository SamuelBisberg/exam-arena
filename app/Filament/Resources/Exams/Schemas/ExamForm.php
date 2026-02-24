<?php

namespace App\Filament\Resources\Exams\Schemas;

use App\Enums\SemesterEnum;
use App\Enums\SessionEnum;
use App\Enums\VisibilityStatusEnum;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;

class ExamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('questionnaire_identifier')
                    ->required()
                    ->columnSpanFull(),
                Radio::make('session')
                    ->options(SessionEnum::pluck())
                    ->descriptions(collect(SessionEnum::cases())->mapWithKeys(fn ($case): array => [
                        $case->value => $case->description(),
                    ]))
                    ->required(),
                Radio::make('semester')
                    ->options(SemesterEnum::pluck())
                    ->descriptions(collect(SemesterEnum::cases())->mapWithKeys(fn ($case): array => [
                        $case->value => $case->description(),
                    ]))
                    ->required(),
                Select::make('year')
                    ->options(fn (): array => array_combine(
                        range(now()->year - 20, now()->year + 2),
                        range(now()->year - 20, now()->year + 2)
                    ))
                    ->default(now()->year)
                    ->required(),
                DatePicker::make('exam_date')
                    ->default(now())
                    ->required(),
                ToggleButtons::make('visibility_status')
                    ->options(VisibilityStatusEnum::pluck())
                    ->colors(VisibilityStatusEnum::pluck('color'))
                    ->default(VisibilityStatusEnum::PUBLISHED)
                    ->columnSpanFull()
                    ->inline()
                    ->required(),
                TextInput::make('total_pages')
                    ->required()
                    ->minValue(1)
                    ->numeric(),
                TextInput::make('total_questions')
                    ->required()
                    ->minValue(1)
                    ->numeric(),
                TextInput::make('duration_minutes')
                    ->required()
                    ->minValue(1)
                    ->default(120)
                    ->numeric(),
                Textarea::make('instructions')
                    ->columnSpanFull(),
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->preload()
                    ->searchable()
                    ->required(),
            ]);
    }
}
