<?php

namespace App\Filament\Resources\Courses\RelationManagers;

use App\Filament\Resources\Topics\TopicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TopicsRelationManager extends RelationManager
{
    protected static string $relationship = 'topics';

    protected static ?string $relatedResource = TopicResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
