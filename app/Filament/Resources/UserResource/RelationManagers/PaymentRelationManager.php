<?php

namespace App\Filament\Resources\UserResource\RelationManagers;
use Filament\Forms\Components\Select;
use App\Models\Payment;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentRelationManager extends RelationManager
{
    protected static string $relationship = 'payment';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->required()
                ->label('User')
                ->searchable()
                ->options(User::all()->pluck('name', 'id')),

                Forms\Components\TextInput::make('package_id')           
                ->required()
                ->maxLength(255),
                
                Forms\Components\TextInput::make('status')           
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('subscription_id')           
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('payer_id')           
                ->required()
                ->maxLength(255),

                Forms\Components\TextInput::make('next_billing_time')           
                ->required()
                ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('user.name'),
                Tables\Columns\TextColumn::make('package_id'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('subscription_id'),
                Tables\Columns\TextColumn::make('payer_id'),
                Tables\Columns\TextColumn::make('next_billing_time'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }    
}
