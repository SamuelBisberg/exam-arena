<?php

namespace App\Filament\Resources\Univercities\Tables;

use App\Filament\Resources\Univercities\UnivercityResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UnivercitiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_path')
                    ->defaultImageUrl(fn ($record): string => asset($record->logo_path))
                    ->alignCenter()
                    ->label('Logo'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('website_url')
                    ->label('Website')
                    ->formatStateUsing(fn ($state): string|array => str_replace(['http://', 'https://'], '', $state))
                    ->icon(Heroicon::ArrowTopRightOnSquare)
                    ->iconPosition(IconPosition::After)
                    ->url(fn ($record) => $record->website_url, shouldOpenInNewTab: true)
                    ->searchable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('country')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->url(fn ($record): string => UnivercityResource::getUrl('activities', ['record' => $record])),

            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
