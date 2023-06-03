<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SalesResource\Pages;
use App\Filament\Resources\SalesResource\RelationManagers;
use App\Models\Sales;
use App\Models\User;
use App\Models\Package;
use App\Models\Payment;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\DeleteAction;

class SalesResource extends Resource
{
    protected static ?string $model = Sales::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    public static function form(Form $form): Form
    {
        return $form->columns(1)
            ->schema([
                Select::make('user_id')
                ->required()
                ->label('User')
                ->searchable()
                ->options(User::all()->pluck('name', 'id')),

                Select::make('package_id')
                ->required()
                ->label('Package')
                ->searchable()
                ->options(Package::all()->pluck('name', 'id')),

                Select::make('payment_id')
                ->required()
                ->label('Payment Id')
                ->searchable()
                ->options(Payment::all()->pluck('id', 'id')),

            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('package_id'),
                Tables\Columns\TextColumn::make('payment.amount'),
                Tables\Columns\TextColumn::make('created_at'),
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
            RelationManagers\PaymentRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSales::route('/'),
            'create' => Pages\CreateSales::route('/create'),
            'edit' => Pages\EditSales::route('/{record}/edit'),
        ];
    }
}
