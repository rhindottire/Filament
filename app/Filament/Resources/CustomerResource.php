<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Filament\Resources\CustomerResource\RelationManagers;
use App\Models\Customer;
use App\Models\CustomerModel;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomerResource extends Resource
{
    protected static ?string $model = CustomerModel::class; // custom model name

    protected static ?string $navigationIcon = 'heroicon-o-user'; // https://filamentphp.com/docs/3.x/panels/navigation
    protected static ?string $navigationLabel = 'Customer Management'; // custom
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $slug = 'Custom-Slug';
    protected static ?string $label = 'Custom Label';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('customer_name')
                    ->required()
                    ->label('Name')
                    ->placeholder('Input your name here...'),
                TextInput::make('customer_code')
                    // ->required()
                    ->label('Code')
                    ->numeric(),
                TextInput::make('customer_address')
                    ->required()
                    ->label('Address'),
                TextInput::make('customer_phone')
                    ->required()
                    ->label('Phone'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_name')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('customer_code')
                    ->label('Code')
                    ->copyable()
                    ->copyMessage('Custom Copied Message'),
                TextColumn::make('customer_address')
                    ->label('Address'),
                TextColumn::make('customer_phone')
                    ->label('Phone')
                    ->sortable(),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
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
