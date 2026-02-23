<?php

namespace App\Filament\Resources\Universities\RelationManagers;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\AssociateAction;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    protected static ?string $relatedResource = CourseResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
                AssociateAction::make()
                    ->preloadRecordSelect(),
            ]);
    }
}
