<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventRegistrationResource\Pages;
use App\Models\EventRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament pour consulter les inscriptions aux événements.
 */
class EventRegistrationResource extends Resource
{
  protected static ?string $model = EventRegistration::class;

  protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

  protected static ?string $navigationGroup = 'Événements';

  protected static ?int $navigationSort = 2;

  protected static ?string $modelLabel = 'Inscription';

  protected static ?string $pluralModelLabel = 'Inscriptions';

  /**
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Select::make('event_id')
          ->label('Événement')
          ->relationship('event', 'title')
          ->required()
          ->searchable()
          ->preload(),
        Forms\Components\TextInput::make('name')
          ->label('Nom')
          ->required()
          ->maxLength(255),
        Forms\Components\TextInput::make('email')
          ->label('E-mail')
          ->email()
          ->maxLength(255),
        Forms\Components\TextInput::make('phone')
          ->label('Téléphone')
          ->tel()
          ->maxLength(255),
        Forms\Components\Textarea::make('message')
          ->label('Message')
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
        Tables\Columns\TextColumn::make('event.title')
          ->label('Événement')
          ->searchable()
          ->sortable(),
        Tables\Columns\TextColumn::make('name')
          ->label('Nom')
          ->searchable(),
        Tables\Columns\TextColumn::make('email')
          ->label('E-mail'),
        Tables\Columns\TextColumn::make('phone')
          ->label('Téléphone'),
        Tables\Columns\TextColumn::make('created_at')
          ->label('Reçu le')
          ->dateTime()
          ->sortable(),
      ])
      ->defaultSort('created_at', 'desc')
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
      'index' => Pages\ListEventRegistrations::route('/'),
      'create' => Pages\CreateEventRegistration::route('/create'),
      'edit' => Pages\EditEventRegistration::route('/{record}/edit'),
    ];
  }
}
