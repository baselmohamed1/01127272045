<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServerResource\Pages;
use App\Filament\Resources\ServerResource\RelationManagers;
use App\Models\Server;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\Select;


class ServerResource extends Resource
{
    protected static ?string $model = Server::class;

    protected static ?string $navigationIcon = 'heroicon-o-server';

    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([

                Select::make('user_id')
                ->required()
                ->label('User')
                ->searchable()
                ->options(User::all()->pluck('name', 'id')),

                Forms\Components\TextInput::make('server_name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('ssh_host_name')
                ->required()
                ->maxLength(255),  

                Forms\Components\TextInput::make('ssh_user_name')
                ->required()
                ->maxLength(255),

                             

                Forms\Components\TextInput::make('ssh_password')
                ->required()
                ->maxLength(255),
                
                
             
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('server_name'),
                Tables\Columns\TextColumn::make('ssh_host_name'),  
                Tables\Columns\TextColumn::make('ssh_user_name'),                            
                Tables\Columns\TextColumn::make('ssh_password'),
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
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServers::route('/'),
            'create' => Pages\CreateServer::route('/create'),
            'edit' => Pages\EditServer::route('/{record}/edit'),
        ];
    }    
}
