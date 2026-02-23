<?php

namespace App\Filament\Resources\Univercities;

use App\Enums\NavigationGroupEnum;
use App\Filament\Resources\Univercities\Pages\CreateUnivercity;
use App\Filament\Resources\Univercities\Pages\EditUnivercity;
use App\Filament\Resources\Univercities\Pages\ListUnivercities;
use App\Filament\Resources\Univercities\Pages\ListUnivercityActivities;
use App\Filament\Resources\Univercities\RelationManagers\CoursesRelationManager;
use App\Filament\Resources\Univercities\Schemas\UnivercityForm;
use App\Filament\Resources\Univercities\Schemas\UnivercityInfolist;
use App\Filament\Resources\Univercities\Tables\UnivercitiesTable;
use App\Models\Univercity;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use UnitEnum;

class UnivercityResource extends Resource
{
    protected static ?string $model = Univercity::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string|UnitEnum|null $navigationGroup = NavigationGroupEnum::MANAGEMENT;

    public static function form(Schema $schema): Schema
    {
        return UnivercityForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UnivercityInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UnivercitiesTable::configure($table);
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
            'index' => ListUnivercities::route('/'),
            'create' => CreateUnivercity::route('/create'),
            'edit' => EditUnivercity::route('/{record}/edit'),
            'activities' => ListUnivercityActivities::route('/{record}/activities'),
        ];
    }
}
