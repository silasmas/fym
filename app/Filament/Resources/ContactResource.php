<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament pour consulter les messages de contact reçus.
 */
class ContactResource extends Resource
{
  protected static ?string $model = Contact::class;

  protected static ?string $navigationIcon = 'heroicon-o-envelope';

  protected static ?string $navigationGroup = 'Communication';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Message';

  protected static ?string $pluralModelLabel = 'Messages';

  /**
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
        Forms\Components\TextInput::make('email')
          ->label('E-mail')
          ->email()
          ->maxLength(255),
        Forms\Components\TextInput::make('phone')
          ->label('Téléphone')
          ->tel()
          ->maxLength(255),
        Forms\Components\TextInput::make('subject')
          ->label('Sujet')
          ->maxLength(255),
        Forms\Components\Textarea::make('message')
          ->label('Message')
          ->required()
          ->rows(6)
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
        Tables\Columns\TextColumn::make('name')
          ->label('Nom')
          ->searchable(),
        Tables\Columns\TextColumn::make('email')
          ->label('E-mail')
          ->searchable(),
        Tables\Columns\TextColumn::make('subject')
          ->label('Sujet')
          ->limit(40),
        Tables\Columns\TextColumn::make('message')
          ->label('Message')
          ->limit(50)
          ->toggleable(),
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
      'index' => Pages\ListContacts::route('/'),
      'create' => Pages\CreateContact::route('/create'),
      'edit' => Pages\EditContact::route('/{record}/edit'),
    ];
  }
}
