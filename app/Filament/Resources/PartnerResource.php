<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament pour gérer les partenaires affichés sur le site.
 */
class PartnerResource extends Resource
{
  protected static ?string $model = Partner::class;

  protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

  protected static ?string $navigationGroup = 'Médias';

  protected static ?int $navigationSort = 2;

  protected static ?string $modelLabel = 'Partenaire';

  protected static ?string $pluralModelLabel = 'Partenaires';

  /**
   * Définit le formulaire de création/édition d'un partenaire.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('name')
          ->label('Nom')
          ->required()
          ->maxLength(255),
        Forms\Components\FileUpload::make('logo')
          ->label('Logo')
          ->image()
          ->disk('public')
          ->directory('partners')
          ->visibility('public'),
        Forms\Components\TextInput::make('website')
          ->label('Site web')
          ->url()
          ->maxLength(255),
        Forms\Components\TextInput::make('position')
          ->label('Ordre')
          ->numeric()
          ->default(0)
          ->required(),
      ]);
  }

  /**
   * Définit le tableau de liste des partenaires.
   *
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('logo')
          ->label('Logo')
          ->disk('public'),
        Tables\Columns\TextColumn::make('name')
          ->label('Nom')
          ->searchable(),
        Tables\Columns\TextColumn::make('website')
          ->label('Site web')
          ->url(fn (Partner $record): ?string => $record->website)
          ->openUrlInNewTab(),
        Tables\Columns\TextColumn::make('position')
          ->label('Ordre')
          ->sortable(),
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
      'index' => Pages\ListPartners::route('/'),
      'create' => Pages\CreatePartner::route('/create'),
      'edit' => Pages\EditPartner::route('/{record}/edit'),
    ];
  }
}
