<?php

namespace App\Filament\Resources;

use App\Enums\ExpenditureType;
use App\Filament\Resources\ExpenditureResource\Pages;
use App\Filament\Resources\ExpenditureResource\RelationManagers;
use App\Models\Expenditure;
use App\Models\Income;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExpenditureResource extends Resource
{
    protected static ?string $model = Expenditure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('currency')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('grossAmount')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('reference')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('merchant')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('paidAt')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('grossAmount')
                    ->label('Amount')
                    ->searchable(),
                Tables\Columns\TextColumn::make('currency')
                    ->badge()
                    ->color(fn (Expenditure $expenditure) => match ($expenditure->currency) {
                        'EUR' => 'primary',
                        'HUF' => 'info',
                        default => 'neutral',
                    })
                    ->searchable(),
                Tables\Columns\SelectColumn::make('type')
                    ->options(ExpenditureType::class)
                    ->rules(['required'])
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(20)
                    ->tooltip(fn (Expenditure $exp) => $exp->description)
                    ->searchable(),
                Tables\Columns\TextColumn::make('reference')
                    ->searchable(),
                Tables\Columns\TextColumn::make('merchant')
                    ->searchable(),
                Tables\Columns\TextColumn::make('paidAt')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListExpenditures::route('/'),
            'create' => Pages\CreateExpenditure::route('/create'),
            'edit' => Pages\EditExpenditure::route('/{record}/edit'),
        ];
    }
}
