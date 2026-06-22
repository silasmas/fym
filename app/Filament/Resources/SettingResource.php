<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament pour gérer les paramètres globaux du site.
 */
class SettingResource extends Resource
{
  protected static ?string $model = Setting::class;

  protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

  protected static ?string $navigationGroup = 'Système';

  protected static ?int $navigationSort = 2;

  protected static ?string $modelLabel = 'Paramètre';

  protected static ?string $pluralModelLabel = 'Paramètres';

  /**
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\TextInput::make('key')
          ->label('Clé')
          ->required()
          ->maxLength(255)
          ->unique(ignoreRecord: true)
          ->placeholder('contact_email'),
        Forms\Components\Textarea::make('value')
          ->label('Valeur')
          ->rows(4)
          ->columnSpanFull(),
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
        Tables\Columns\TextColumn::make('key')
          ->label('Clé')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('value')
          ->label('Valeur')
          ->limit(80)
          ->wrap(),
        Tables\Columns\TextColumn::make('updated_at')
          ->label('Modifié le')
          ->dateTime()
          ->sortable(),
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

  /**
   * @return array<string, class-string>
   */
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListSettings::route('/'),
      'create' => Pages\CreateSetting::route('/create'),
      'edit' => Pages\EditSetting::route('/{record}/edit'),
    ];
  }
}
