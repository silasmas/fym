<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjetPhotoResource\Pages;
use App\Models\ProjetPhoto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament technique pour les photos de projet (masquée du menu).
 */
class ProjetPhotoResource extends Resource
{
  protected static ?string $model = ProjetPhoto::class;

  protected static ?string $navigationIcon = 'heroicon-o-photo';

  protected static bool $shouldRegisterNavigation = false;

  /**
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Select::make('projet_id')
          ->label('Projet')
          ->relationship('projet', 'title')
          ->required(),
        Forms\Components\FileUpload::make('path')
          ->label('Image')
          ->image()
          ->disk('public')
          ->directory('projets/photos')
          ->required(),
        Forms\Components\TextInput::make('caption')
          ->label('Légende')
          ->maxLength(255),
        Forms\Components\TextInput::make('position')
          ->label('Ordre')
          ->numeric()
          ->default(0),
      ]);
  }

  /**
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('path')->disk('public'),
        Tables\Columns\TextColumn::make('projet.title')->label('Projet'),
        Tables\Columns\TextColumn::make('position')->label('Ordre'),
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
      'index' => Pages\ListProjetPhotos::route('/'),
      'create' => Pages\CreateProjetPhoto::route('/create'),
      'edit' => Pages\EditProjetPhoto::route('/{record}/edit'),
    ];
  }
}
