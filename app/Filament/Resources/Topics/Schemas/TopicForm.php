<?php

namespace App\Filament\Resources\Topics\Schemas;

use App\Enums\TopicStatusEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TopicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('topic_status')
                    ->options(TopicStatusEnum::pluck())
                    ->required(),
                Select::make('course_id')
                    ->relationship('course', 'title')
                    ->label(__('Course'))
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }
}
