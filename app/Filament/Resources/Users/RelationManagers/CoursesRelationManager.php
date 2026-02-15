<?php

namespace App\Filament\Resources\Users\RelationManagers;

use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\AssociateAction;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';

    protected static ?string $inverseRelationship = 'createdBy';

    protected static ?string $relatedResource = CourseResource::class;

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('Created Courses');
    }

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                AssociateAction::make()
                    ->preloadRecordSelect()
                    ->label(__('Associate Existing Course')),
                CreateAction::make(),
            ]);
    }
}
