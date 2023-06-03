<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentResource\Pages;
use App\Filament\Resources\ContentResource\RelationManagers;
use App\Models\Content;
use App\Models\User;
use App\Models\Server;
use App\Models\Platform;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\DeleteAction;

class ContentResource extends Resource
{
    protected static ?string $model = Content::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([

                Select::make('user_id')
                ->required()
                ->label('User')
                ->searchable()
                ->options(User::all()->pluck('name', 'id')),

                Select::make('platform_id')
                ->required()
                ->label('Platform')
                ->searchable()
                ->options(Platform::all()->pluck('name', 'id' )),

                Select::make('server_id')
                ->required()
                ->label('server')
                ->searchable()
                ->options(Server::all()->pluck('name', 'id' )),

                Forms\Components\TextInput::make('content_name')           
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('url')           
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('folder_path')           
                ->required()
                ->maxLength(255),
                
                Select::make('media_type')
                 ->required()
                 ->label('Media type')
                 ->options(["movie" => "movie", "series" => "series"]),
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('platform.domain'),
                Tables\Columns\TextColumn::make('server.server_name'),
                Tables\Columns\TextColumn::make('content_name'),
                Tables\Columns\TextColumn::make('url'),
                Tables\Columns\TextColumn::make('folder_path'),
                Tables\Columns\TextColumn::make('media_type'),
                
                
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
            'index' => Pages\ListContents::route('/'),
            'create' => Pages\CreateContent::route('/create'),
            'edit' => Pages\EditContent::route('/{record}/edit'),
        ];
    }    
}
