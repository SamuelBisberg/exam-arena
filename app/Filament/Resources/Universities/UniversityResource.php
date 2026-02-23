<?php

namespace App\Filament\Resources\Universities;

use App\Enums\NavigationGroupEnum;
use App\Filament\Resources\Universities\Pages\CreateUniversity;
use App\Filament\Resources\Universities\Pages\EditUniversity;
use App\Filament\Resources\Universities\Pages\ListUniversities;
use App\Filament\Resources\Universities\Pages\ListUniversityActivities;
use App\Filament\Resources\Universities\RelationManagers\CoursesRelationManager;
use App\Filament\Resources\Universities\Schemas\UniversityForm;
use App\Filament\Resources\Universities\Schemas\UniversityInfolist;
use App\Filament\Resources\Universities\Tables\UniversitiesTable;
use App\Models\University;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class UniversityResource extends Resource
{
    protected static ?string $model = University::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = NavigationGroupEnum::MANAGEMENT;

    public static function form(Schema $schema): Schema
    {
        return UniversityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UniversityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UniversitiesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUniversities::route('/'),
            'create' => CreateUniversity::route('/create'),
            'edit' => EditUniversity::route('/{record}/edit'),
            'activities' => ListUniversityActivities::route('/{record}/activities'),
        ];
    }
}
