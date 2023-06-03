<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaDomainResource\Pages;
use App\Filament\Resources\MediaDomainResource\RelationManagers;
use App\Models\MediaDomain;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\DeleteAction;


class MediaDomainResource extends Resource
{
    protected static ?string $model = MediaDomain::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('old_domain')           
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('new_domain')           
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('old_domain'),
                Tables\Columns\TextColumn::make('new_domain'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMediaDomains::route('/'),
            'create' => Pages\CreateMediaDomain::route('/create'),
            'edit' => Pages\EditMediaDomain::route('/{record}/edit'),
        ];
    }    
}
