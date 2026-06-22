<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

/**
 * Ressource Filament pour gérer les utilisateurs administrateurs.
 */
class UserResource extends Resource
{
  protected static ?string $model = User::class;

  protected static ?string $navigationIcon = 'heroicon-o-users';

  protected static ?string $navigationGroup = 'Système';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Utilisateur';

  protected static ?string $pluralModelLabel = 'Utilisateurs';

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
          ->required()
          ->maxLength(255)
          ->unique(ignoreRecord: true),
        Forms\Components\DateTimePicker::make('email_verified_at')
          ->label('E-mail vérifié le'),
        Forms\Components\TextInput::make('password')
          ->label('Mot de passe')
          ->password()
          ->revealable()
          ->dehydrateStateUsing(fn (?string $state): ?string => filled($state) ? Hash::make($state) : null)
          ->dehydrated(fn (?string $state): bool => filled($state))
          ->required(fn (string $operation): bool => $operation === 'create')
          ->maxLength(255),
        Forms\Components\Select::make('roles')
          ->label('Rôles')
          ->relationship('roles', 'name')
          ->multiple()
          ->preload(),
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
        Tables\Columns\TextColumn::make('roles.name')
          ->label('Rôles')
          ->badge(),
        Tables\Columns\TextColumn::make('email_verified_at')
          ->label('Vérifié le')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
        Tables\Columns\TextColumn::make('created_at')
          ->label('Créé le')
          ->dateTime()
          ->sortable()
          ->toggleable(isToggledHiddenByDefault: true),
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
      'index' => Pages\ListUsers::route('/'),
      'create' => Pages\CreateUser::route('/create'),
      'edit' => Pages\EditUser::route('/{record}/edit'),
    ];
  }
}
