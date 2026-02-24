<?php

namespace App\Filament\Resources\Exams\Schemas;

use Filament\Infolists\Components\KeyValueEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Carbon;

class ExamInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('questionnaire_identifier')
                    ->label('Identifier')
                    ->icon(Heroicon::DocumentText)
                    ->badge()
                    ->color('gray')
                    ->copyable(),
                TextEntry::make('session')
                    ->label('Session')
                    ->icon(Heroicon::Clock)
                    ->badge()
                    ->color('info'),
                TextEntry::make('semester')
                    ->label('Semester')
                    ->icon(Heroicon::CalendarDays)
                    ->badge()
                    ->color('primary'),
                TextEntry::make('year')
                    ->label('Year')
                    ->icon(Heroicon::Calendar),
                TextEntry::make('exam_date')
                    ->label('Exam Date')
                    ->icon(Heroicon::CalendarDateRange)
                    ->date('M d, Y')
                    ->badge()
                    ->color(function ($state): string {
                        if (blank($state)) {
                            return 'gray';
                        }

                        $examDate = Carbon::parse($state)->startOfDay();

                        if ($examDate->isToday()) {
                            return 'warning';
                        }

                        return $examDate->isPast() ? 'danger' : 'success';
                    }),
                TextEntry::make('visibility_status')
                    ->label('Visibility')
                    ->badge()
                    ->icon(Heroicon::Eye)
                    ->color(fn ($state): string => $state?->color() ?? 'gray'),

                KeyValueEntry::make('stats')
                    ->label('Properties')
                    ->keyLabel('Property Name')
                    ->valueLabel('Value')
                    ->state(
                        function ($record): array {
                            $totalPages = $record->total_pages;
                            $totalQuestions = $record->total_questions;
                            $durationMinutes = $record->duration_minutes;

                            $questionDensity = (
                                is_numeric($totalQuestions)
                                && is_numeric($totalPages)
                                && (float) $totalPages > 0
                            )
                                ? number_format((float) $totalQuestions / (float) $totalPages, 2).' q/page'
                                : '-';

                            $averagePace = (
                                is_numeric($durationMinutes)
                                && is_numeric($totalQuestions)
                                && (float) $totalQuestions > 0
                            )
                                ? number_format((float) $durationMinutes / (float) $totalQuestions, 2).' min/question'
                                : '-';

                            $examWindow = collect([
                                $record->semester,
                                $record->session,
                                $record->year,
                            ])->filter(fn ($value): bool => filled($value))->implode(' • ');

                            return [
                                'Total Pages' => $totalPages ?? '-',
                                'Total Questions' => $totalQuestions ?? '-',
                                'Duration' => is_numeric($durationMinutes) ? "{$durationMinutes} min" : '-',
                                'Question Density' => $questionDensity,
                                'Average Pace' => $averagePace,
                                'Exam Window' => filled($examWindow) ? $examWindow : '-',
                            ];
                        }
                    ),
                TextEntry::make('instructions')
                    ->label('Instructions')
                    ->icon(Heroicon::DocumentText)
                    ->formatStateUsing(fn (?string $state): ?string => filled($state) ? nl2br(e($state)) : null)
                    ->html()
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Created At')
                    ->icon(Heroicon::Clock)
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Updated At')
                    ->icon(Heroicon::Clock)
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('course.title')
                    ->label('Course')
                    ->icon(Heroicon::AcademicCap)
                    ->placeholder('-'),
                TextEntry::make('course.university.name')
                    ->label('University')
                    ->icon(Heroicon::BuildingLibrary)
                    ->placeholder('-'),
            ]);
    }
}
