<?php

namespace App\Filament\Resources\Topics\Tables;

use App\Enums\TopicStatusEnum;
use App\Filament\Resources\Topics\TopicResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TopicsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('order_column')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('topic_status')
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        TopicStatusEnum::ACTIVE => 'success',
                        TopicStatusEnum::INACTIVE => 'warning',
                        TopicStatusEnum::DRAFT => 'gray',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn ($state) => $state?->label() ?? '-')
                    ->searchable(),
                TextColumn::make('course.title')
                    ->label('Course')
                    ->url(fn ($record): string => route('filament.admin.resources.courses.edit', $record->course_id))
                    ->icon(Heroicon::OutlinedLink)
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable()
                    ->tooltip(fn ($record) => $record->description)
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->limit(40),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('activities')
                    ->label('Activities')
                    ->icon(Heroicon::ArchiveBox)
                    ->color('info')
                    ->url(fn ($record): string => TopicResource::getUrl('activities', ['record' => $record])),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),

                ]),
            ])
            ->reorderable('order_column')
            ->modifyQueryUsing(fn ($query) => $query->orderBy('course_id')->orderBy('order_column'));
    }
}
