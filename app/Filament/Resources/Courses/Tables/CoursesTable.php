<?php

namespace App\Filament\Resources\Courses\Tables;

use App\Enums\CourseActivityStatusEnum;
use App\Enums\CourseLevelEnum;
use App\Filament\Resources\Courses\CourseResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CoursesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image')
                    ->conversion('thumb')
                    ->square()
                    ->label('Image'),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('course_code')
                    ->searchable(),
                TextColumn::make('level')
                    ->icon(fn ($state): Heroicon => match ($state) {
                        CourseLevelEnum::BACHELORS => Heroicon::AcademicCap,
                        CourseLevelEnum::ADVANCED_BACHELORS => Heroicon::RocketLaunch,
                        CourseLevelEnum::MASTERS => Heroicon::LightBulb,
                        default => Heroicon::QuestionMarkCircle,
                    })
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->color('natural')
                    ->badge()
                    ->searchable(),
                TextColumn::make('activity_status')
                    ->badge()
                    ->color(fn ($state): string => match ($state) {
                        CourseActivityStatusEnum::ACTIVE => 'success',
                        CourseActivityStatusEnum::INACTIVE => 'warning',
                        CourseActivityStatusEnum::DRAFT => 'gray',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn ($state) => $state->label())
                    ->searchable(),
                TextColumn::make('createdBy.name')
                    ->label('Created By')
                    ->sortable()
                    ->icon(Heroicon::ArrowTopRightOnSquare)
                    ->iconPosition(IconPosition::After)
                    ->url(fn ($record): ?string => $record?->createdBy ? route('home') : null)
                    ->placeholder('—'),
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
                ViewAction::make(),
                EditAction::make(),
                Action::make('activities')
                    ->label('Activities')
                    ->icon(Heroicon::ArchiveBox)
                    ->color('info')
                    ->url(fn ($record): string => CourseResource::getUrl('activities', ['record' => $record])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
