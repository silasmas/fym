<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

/**
 * Ressource Filament pour gérer les services de la fondation.
 */
class ServiceResource extends Resource
{
  protected static ?string $model = Service::class;

  protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

  protected static ?string $navigationGroup = 'Services';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Service';

  protected static ?string $pluralModelLabel = 'Services';

  /**
   * Définit le formulaire de création/édition d'un service.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Informations')
          ->schema([
            Forms\Components\TextInput::make('title')
              ->label('Titre')
              ->required()
              ->maxLength(255)
              ->live(onBlur: true)
              ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
            Forms\Components\TextInput::make('slug')
              ->label('Slug')
              ->required()
              ->maxLength(255)
              ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('icon')
              ->label('Icône')
              ->placeholder('heroicon-o-leaf')
              ->maxLength(255),
            Forms\Components\Textarea::make('summary')
              ->label('Résumé')
              ->rows(3)
              ->columnSpanFull(),
            Forms\Components\RichEditor::make('content')
              ->label('Contenu')
              ->columnSpanFull(),
          ])
          ->columns(2),
        Forms\Components\Section::make('Affichage')
          ->schema([
            Forms\Components\TextInput::make('position')
              ->label('Ordre')
              ->numeric()
              ->default(0)
              ->required(),
            Forms\Components\Select::make('status')
              ->label('Statut')
              ->options([
                'visible' => 'Visible',
                'hidden' => 'Masqué',
              ])
              ->default('visible')
              ->required(),
          ])
          ->columns(2),
      ]);
  }

  /**
   * Définit le tableau de liste des services.
   *
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\TextColumn::make('title')
          ->label('Titre')
          ->searchable(),
        Tables\Columns\TextColumn::make('slug')
          ->label('Slug')
          ->toggleable(isToggledHiddenByDefault: true),
        Tables\Columns\TextColumn::make('position')
          ->label('Ordre')
          ->sortable(),
        Tables\Columns\TextColumn::make('status')
          ->label('Statut')
          ->badge()
          ->color(fn (string $state): string => match ($state) {
            'visible' => 'success',
            default => 'gray',
          }),
        Tables\Columns\TextColumn::make('updated_at')
          ->label('Modifié le')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
      ])
      ->defaultSort('position')
      ->reorderable('position')
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

  /**
   * Retourne les pages associées à la ressource.
   *
   * @return array<string, class-string>
   */
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListServices::route('/'),
      'create' => Pages\CreateService::route('/create'),
      'edit' => Pages\EditService::route('/{record}/edit'),
    ];
  }
}
