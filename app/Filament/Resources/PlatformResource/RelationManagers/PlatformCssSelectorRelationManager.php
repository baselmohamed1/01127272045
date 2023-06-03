<?php

namespace App\Filament\Resources\PlatformResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use App\Models\Platform;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlatformCssSelectorRelationManager extends RelationManager
{
    protected static string $relationship = 'platform_css_selector';

    protected static ?string $label = 'Platform CSS Selector';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([
                // Forms\Components\TextInput::make('id')
                //     ->required()
                //     ->maxLength(255),

                    // Select::make('platform_id')
                    // ->required()
                    // ->label('Platform')
                    // ->searchable()
                    // ->options(Platform::all()->pluck('name', 'id' )),

                    Select::make('media_type')
                    ->required()
                    ->label('Media type')
                    ->options(["movie" => "movie", "series" => "series"]),

                    Forms\Components\TextInput::make('css_selector')
                    ->required()
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id'),
                // Tables\Columns\TextColumn::make('platform_id'),
                Tables\Columns\TextColumn::make('media_type'),
                Tables\Columns\TextColumn::make('css_selector'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
