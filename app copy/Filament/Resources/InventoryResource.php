<?php

namespace App\Filament\Resources;


use App\Models\emptecnico;
use App\Filament\Resources\InventoryResource\Pages;
use App\Filament\Resources\InventoryResource\RelationManagers;
use App\Models\Inventory;
use Filament\Actions\DeleteAction as ActionsDeleteAction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;
    protected static ?string $modelLabel = 'Inventario';
    protected static ?string $navigationLabel = 'Inventario';
    protected static ?int $navigationSort = 7;
    protected static ?string $navigationGroup = 'Administracion';

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 5 ? 'danger' : 'gray';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Equipo')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('Estado')
                    ->options([
                        'Disponible' => 'Disponible',
                        'Ocupado' => 'Ocupado',
                    ])->default('Disponible'),
                Forms\Components\Select::make('emptecnicos_id')
                    ->label("Tecnico Encargado")
                    ->relationship('emptecnicos', 'nombre')
                    ->preload(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Aun no hay equipos')
            ->emptyStateDescription('Agrega nueva informacion')
            ->columns([
                Tables\Columns\TextColumn::make('Equipo')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('Estado')
                    ->options([
                        'Disponible' => 'Disponible',
                        'Ocupado' => 'Ocupado',
                    ])->default('Disponible'),
                Tables\Columns\TextColumn::make('emptecnicos.nombre')
                    ->label('En uso por')
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
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make()
                    ->modalDescription('Estas seguro que quieres borrar esto?')
                    ->modalSubmitActionLabel('Si'),
                    ExportAction::make(),
                ])->tooltip('Actions')
                    ->color('info'),
            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }
}
