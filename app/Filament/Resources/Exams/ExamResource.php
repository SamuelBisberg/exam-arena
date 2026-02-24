<?php

namespace App\Filament\Resources\Exams;

use App\Enums\NavigationGroupEnum;
use App\Filament\Resources\Exams\Pages\CreateExam;
use App\Filament\Resources\Exams\Pages\EditExam;
use App\Filament\Resources\Exams\Pages\ListExamActivities;
use App\Filament\Resources\Exams\Pages\ListExams;
use App\Filament\Resources\Exams\Pages\ViewExam;
use App\Filament\Resources\Exams\Schemas\ExamForm;
use App\Filament\Resources\Exams\Schemas\ExamInfolist;
use App\Filament\Resources\Exams\Tables\ExamsTable;
use App\Models\Exam;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class ExamResource extends Resource
{
    protected static ?string $model = Exam::class;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroupEnum::CONTENT;

    protected static ?string $recordTitleAttribute = 'questionnaire_identifier';

    public static function form(Schema $schema): Schema
    {
        return ExamForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ExamInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ExamsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListExams::route('/'),
            'create' => CreateExam::route('/create'),
            'view' => ViewExam::route('/{record}'),
            'edit' => EditExam::route('/{record}/edit'),
            'activities' => ListExamActivities::route('/{record}/activities'),
        ];
    }
}
