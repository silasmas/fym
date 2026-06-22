<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament pour gérer les diapositives du carrousel d'accueil.
 */
class SliderResource extends Resource
{
  protected static ?string $model = Slider::class;

  protected static ?string $navigationIcon = 'heroicon-o-photo';

  protected static ?string $navigationGroup = 'Médias';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Diapositive';

  protected static ?string $pluralModelLabel = 'Diapositives';

  /**
   * Définit le formulaire de création/édition d'une diapositive.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Contenu')
          ->schema([
            Forms\Components\TextInput::make('title')
              ->label('Titre')
              ->maxLength(255),
            Forms\Components\TextInput::make('subtitle')
              ->label('Sous-titre')
              ->maxLength(255),
            Forms\Components\TextInput::make('button_text')
              ->label('Texte du bouton')
              ->maxLength(255),
            Forms\Components\TextInput::make('button_url')
              ->label('Lien du bouton')
              ->url()
              ->maxLength(255),
            Forms\Components\FileUpload::make('image')
              ->label('Image')
              ->image()
              ->disk('public')
              ->directory('sliders')
              ->visibility('public')
              ->required(),
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
   * Définit le tableau de liste des diapositives.
   *
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('image')
          ->label('Image')
          ->disk('public'),
        Tables\Columns\TextColumn::make('title')
          ->label('Titre')
          ->searchable(),
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
      'index' => Pages\ListSliders::route('/'),
      'create' => Pages\CreateSlider::route('/create'),
      'edit' => Pages\EditSlider::route('/{record}/edit'),
    ];
  }
}
