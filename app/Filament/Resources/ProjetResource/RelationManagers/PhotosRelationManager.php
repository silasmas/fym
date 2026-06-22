<?php

namespace App\Filament\Resources\ProjetResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Gère les photos associées à un projet depuis la fiche projet.
 */
class PhotosRelationManager extends RelationManager
{
  protected static string $relationship = 'photos';

  protected static ?string $title = 'Photos';

  /**
   * Définit le formulaire d'ajout/édition d'une photo.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\FileUpload::make('path')
          ->label('Image')
          ->image()
          ->disk('public')
          ->directory('projets/photos')
          ->visibility('public')
          ->required(),
        Forms\Components\TextInput::make('caption')
          ->label('Légende')
          ->maxLength(255),
        Forms\Components\TextInput::make('position')
          ->label('Ordre')
          ->numeric()
          ->default(0)
          ->required(),
      ]);
  }

  /**
   * Définit le tableau des photos du projet.
   *
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('path')
          ->label('Image')
          ->disk('public'),
        Tables\Columns\TextColumn::make('caption')
          ->label('Légende'),
        Tables\Columns\TextColumn::make('position')
          ->label('Ordre')
          ->sortable(),
      ])
      ->defaultSort('position')
      ->reorderable('position')
      ->headerActions([
        Tables\Actions\CreateAction::make(),
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
}
