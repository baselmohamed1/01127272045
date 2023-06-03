<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
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



class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('email')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('payment_id')
                ->required()
                ->maxLength(255),

                // Forms\Components\TextInput::make('email_verified_at')
                // ->required()
                // ->maxLength(255),

                Forms\Components\TextInput::make('password')
                ->required()
                ->maxLength(255),

                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                // Tables\Columns\TextColumn::make('email_verified_at'),
                // Tables\Columns\TextColumn::make(''),


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
            RelationManagers\ServersRelationManager::class,
            RelationManagers\ContentsRelationManager::class,
            RelationManagers\PaymentRelationManager::class,


        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
