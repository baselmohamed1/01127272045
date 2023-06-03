<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PackageResource\Pages;
use App\Filament\Resources\PackageResource\RelationManagers;
use App\Models\Package;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\Select;
class PackageResource extends Resource
{
    protected static ?string $model = Package::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([
                Select::make('name')
                ->required()
                ->label('Package_name')
                ->options(["Premium" => "premium", "Extra" => "extra", 'Classic' => 'classic']),

                // Forms\Components\TextInput::make('days')
                // ->required()
                // ->maxLength(255),

                Forms\Components\TextInput::make('price')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('content_count')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('server_count')
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('paypal_plan_id')
                ->required()
                ->maxLength(255),

                Select::make('type')
                 ->required()
                 ->label('Type')
                 ->options(["subscription" => "subscription", "addon" => "addon"]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                // Tables\Columns\TextColumn::make('days'),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('content_count'),
                Tables\Columns\TextColumn::make('server_count'),
                Tables\Columns\TextColumn::make('paypal_plan_id'),
                Tables\Columns\TextColumn::make('type'),
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
            'index' => Pages\ListPackages::route('/'),
            'create' => Pages\CreatePackage::route('/create'),
            'edit' => Pages\EditPackage::route('/{record}/edit'),
        ];
    }
}
