<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevisionesResource\Pages;
use App\Filament\Resources\RevisionesResource\RelationManagers;
use App\Models\Revisiones;
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
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\IconPosition;

class RevisionesResource extends Resource
{
    protected static ?string $model = Revisiones::class;
    protected static ?string $modelLabel = 'Revisiones';
    protected static ?string $navigationGroup = 'Administracion';
    protected static ?string $navigationIcon = 'heroicon-o-document-check';
    protected static ?string $navigationLabel = 'Revisiones';
    protected static ?int $navigationSort = 4;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() < 1 ? 'danger' : 'gray';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('General')
                            ->icon('heroicon-m-rectangle-group')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\TextInput::make('Nombre_de_Revision')
                                    ->label("Nombre"),
                                Forms\Components\DatePicker::make('fecharev')
                                    ->label('Fecha de revision')
                                    ->required(),
                                Forms\Components\Select::make('id_ordens')
                                    ->preload()
                                    ->relationship('ordenes', 'id')
                                    ->searchable()
                                    ->required(),
                                Forms\Components\Select::make('tecnicos')
                                    ->relationship('emptecnicos', 'nombre')
                                    ->searchable()
                                    ->required()
                                    ->label("Tecnico"),
                                Forms\Components\TextInput::make('tipoequip')
                                    ->label("Tipo de equipo")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('marca')

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('capacidad')

                                    ->maxLength(191),

                                Forms\Components\TextInput::make('tempambientec')
                                    ->label("Temperatura Ambiente")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('tiporefric')
                                    ->label("Tipo de refrigeracion")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('funciona')

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('cargarefri')
                                    ->label("Carga de refrigerante")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('filtro')
                                    ->label("Filtro")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('compresor')
                                    ->label("Compresor")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('tuboescape')
                                    ->label("Tubo de escape")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('tuboaislado')
                                    ->label("Tubo Aislado")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('tubosoporte')
                                    ->label("Tubo de Soporte")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('breakers')
                                    ->label("Breakers")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('protector')
                                    ->label("Protector")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('lugartrabajo')
                                    ->label("Lugar de Trabajo")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('notas')
                                    ->maxLength(191),
                            ])->columns(3),
                        Tabs\Tab::make('Evaporadora')
                            ->icon('heroicon-m-squares-2x2')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\TextInput::make('voltajeplacaq')
                                    ->label("Voltaje de placa Evaporadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('voltajeconsumoq')
                                    ->label("Voltaje de consumo Evaporadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajeplaceq')
                                    ->label("Amperaje de la placa Evaporadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajel1q')
                                    ->label("Amperaje L1")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajel2q')
                                    ->label("Amperaje L2")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajel3q')
                                    ->label("Amperaje L3")
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('modelevaporc')
                                    ->label("Modelo de la Evaporadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('serialevaporc')
                                    ->label("Serial de la Evaporadora")
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('serpetine')
                                    ->label("Serpentin Evaporadora")
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('ventiladorc')
                                    ->label("Ventilador de Condensadora")
                                    ->maxLength(191),
                            ])->columns(3),
                        Tabs\Tab::make('Condensadora')
                            ->icon('heroicon-m-squares-2x2')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\TextInput::make('voltajeconsumoc')
                                    ->label("Voltaje de consumo Condensadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajeplacec')
                                    ->label("Amperaje de placa Condensadora ")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajel1c')
                                    ->label("Amperaje L1")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajel2c')
                                    ->label("Amperaje L2")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('amperajel3c')
                                    ->label("Amperaje L3")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('psuccionq')
                                    ->label("P. Succion")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('pdescargaq')
                                    ->label("P. Descarga")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('modelcondensaq')
                                    ->label("Modelo de la Condensadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('serialcondensaq')
                                    ->label("Serial de la Condensadora")

                                    ->maxLength(191),
                                Forms\Components\TextInput::make('voltajeplacac')
                                    ->label("Voltaje de la placa Condensadora")
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('sepertinc')
                                    ->label("Serpentin Condensadora")
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('ventiladore')
                                    ->label("Ventilador de la Evaporadora")
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('cableadoe')
                                    ->label("Cableado de la Evaporadora")
                                    ->maxLength(191),
                            ])->columns(3),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading('Aun no hay revisiones')
            ->emptyStateDescription('Agrega una revision')
            ->columns([
                Tables\Columns\TextColumn::make('Nombre_de_Revision')
                    ->searchable()
                    ->label("Nombre")
                    ->hidden(),
                Tables\Columns\TextColumn::make('fecharev')
                    ->searchable()
                    ->label("Fecha de Revision"),
                Tables\Columns\TextColumn::make('id_ordens')
                    ->searchable()
                    ->label("ID de Orden"),
                Tables\Columns\TextColumn::make('emptecnicos.nombre')
                    ->searchable()
                    ->label("Tecnico Encargado"),
                Tables\Columns\TextColumn::make('tipoequip')
                    ->searchable()
                    ->label("Tipo de equipo"),
                Tables\Columns\TextColumn::make('marca')
                    ->searchable()
                    ->label("Marca"),
                Tables\Columns\TextColumn::make('capacidad')
                    ->searchable()
                    ->label("Capacidad"),
                Tables\Columns\TextColumn::make('voltajeplacaq')
                    ->searchable()
                    ->label("Voltaje de placa Evaporadora"),
                Tables\Columns\TextColumn::make('voltajeconsumoq')
                    ->searchable()
                    ->label("Voltaje de consumo Evaporadora"),
                Tables\Columns\TextColumn::make('amperajeplaceq')
                    ->searchable()
                    ->label("Amperaje de la placa Evaporadora"),
                Tables\Columns\TextColumn::make('amperajel1q')
                    ->searchable()
                    ->label("Amperaje L1"),
                Tables\Columns\TextColumn::make('amperajel2q')
                    ->searchable()
                    ->label("Amperaje L2"),
                Tables\Columns\TextColumn::make('amperajel3q')
                    ->searchable()
                    ->label("Amperaje L3"),
                Tables\Columns\TextColumn::make('tempambientec')
                    ->searchable()
                    ->label("Temperatura Ambiente"),
                Tables\Columns\TextColumn::make('tiporefric')
                    ->searchable()
                    ->label("Tipo de refrigeracion"),
                Tables\Columns\TextColumn::make('modelevaporc')
                    ->searchable()
                    ->label("Modelo de la Evaporadora"),
                Tables\Columns\TextColumn::make('serialevaporc')
                    ->searchable()
                    ->label("Serial de la Evaporadora"),
                Tables\Columns\TextColumn::make('voltajeplacac')
                    ->searchable()
                    ->label("Voltaje de la placa Condensadora"),
                Tables\Columns\TextColumn::make('voltajeconsumoc')
                    ->searchable()
                    ->label("Voltaje de consumo Condensadora"),
                Tables\Columns\TextColumn::make('amperajeplacec')
                    ->searchable()
                    ->label("Amperaje de placa Condensadora"),
                Tables\Columns\TextColumn::make('amperajel1c')
                    ->searchable()
                    ->label("Amperaje L1"),
                Tables\Columns\TextColumn::make('amperajel2c')
                    ->searchable()
                    ->label("Amperaje L2"),
                Tables\Columns\TextColumn::make('amperajel3c')
                    ->searchable()
                    ->label("Amperaje L3"),
                Tables\Columns\TextColumn::make('psuccionq')
                    ->searchable()
                    ->label("P. Succion"),
                Tables\Columns\TextColumn::make('pdescargaq')
                    ->searchable()
                    ->label("P. Descarga"),
                Tables\Columns\TextColumn::make('modelcondensaq')
                    ->searchable()
                    ->label("Modelo de la Condensadora"),
                Tables\Columns\TextColumn::make('serialcondensaq')
                    ->searchable()
                    ->label("Serial de la Condensadora"),
                Tables\Columns\TextColumn::make('funciona')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cargarefri')
                    ->searchable()
                    ->label("Carga de Refrigerante"),
                Tables\Columns\TextColumn::make('sepertinc')
                    ->searchable()
                    ->label("Serpentin Condensadora"),
                Tables\Columns\TextColumn::make('serpetine')
                    ->searchable()
                    ->label("Serpertin Evaporadora"),
                Tables\Columns\TextColumn::make('filtro')
                    ->searchable()
                    ->label("Filtro"),
                Tables\Columns\TextColumn::make('ventiladorc')
                    ->searchable()
                    ->label("Ventilador de Condensadora"),
                Tables\Columns\TextColumn::make('ventiladore')
                    ->searchable()
                    ->label("Ventilador de la Evaporadora"),
                Tables\Columns\TextColumn::make('compresor')
                    ->searchable()
                    ->label("Compresor"),
                Tables\Columns\TextColumn::make('tuboescape')
                    ->searchable()
                    ->label("Tubo de escape"),
                Tables\Columns\TextColumn::make('tuboaislado')
                    ->searchable()
                    ->label("Tubo Aislado"),
                Tables\Columns\TextColumn::make('tubosoporte')
                    ->searchable()
                    ->label("Tubo de Soporte"),
                Tables\Columns\TextColumn::make('breakers')
                    ->searchable()
                    ->label("Breakers"),
                Tables\Columns\TextColumn::make('protector')
                    ->searchable()
                    ->label("Protector"),
                Tables\Columns\TextColumn::make('cableadoe')
                    ->searchable()
                    ->label("Cableado de Evaporadora"),
                Tables\Columns\TextColumn::make('lugartrabajo')
                    ->searchable()
                    ->label("Lugar de Trabajo"),
                Tables\Columns\TextColumn::make('notas')
                    ->searchable()
                    ->label("Notas"),
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
                    DeleteAction::make(),
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
            'index' => Pages\ListRevisiones::route('/'),
            'create' => Pages\CreateRevisiones::route('/create'),
            'edit' => Pages\EditRevisiones::route('/{record}/edit'),
        ];
    }
}
