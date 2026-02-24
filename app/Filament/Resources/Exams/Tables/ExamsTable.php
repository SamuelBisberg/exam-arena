<?php

namespace App\Filament\Resources\Exams\Tables;

use App\Filament\Resources\Exams\ExamResource;
use App\Filament\Schemas\Components\ActivitiesLinkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ExamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('questionnaire_identifier')
                    ->label('Identifier')
                    ->searchable(),
                TextColumn::make('term')
                    ->getStateUsing(fn ($record): string => "{$record->year} - {$record->semester->label()}, {$record->session->label()}")
                    ->label('Term')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('course.title')
                    ->label('Course')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->course?->title)
                    ->sortable()
                    ->searchable(),
                TextColumn::make('visibility_status')
                    ->badge()
                    ->searchable()
                    ->color(fn ($state) => $state?->color() ?? 'gray'),
                TextColumn::make('exam_date')
                    ->date()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('session')
                    ->badge()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('semester')
                    ->badge()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('year')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('total_pages')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('total_questions')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('duration_minutes')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('course.title')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                ActivitiesLinkAction::make(ExamResource::class),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
