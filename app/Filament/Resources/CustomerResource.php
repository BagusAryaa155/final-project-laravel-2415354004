<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Customers';

    protected static ?string $navigationGroup = 'ERP';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('customer_id')
                    ->required()
                    ->label('Customer ID'),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Customer Name'),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->required(),

                Forms\Components\Textarea::make('address')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        1 => 'Active',
                        0 => 'Inactive',
                    ])
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('customer_id')
                    ->label('Customer ID')
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('address'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 1,
                        'danger' => 0,
                    ])
                    ->formatStateUsing(fn ($state) => $state ? 'Active' : 'Inactive'),

            ])
            ->actions([

                Tables\Actions\EditAction::make(),

                Tables\Actions\DeleteAction::make(),

            ])
            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([

                    Tables\Actions\DeleteBulkAction::make(),

                ]),

            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
