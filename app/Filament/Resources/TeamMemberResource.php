<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamMemberResource\Pages;
use App\Models\TeamMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * Ressource Filament pour gérer les membres de l'équipe.
 */
class TeamMemberResource extends Resource
{
  protected static ?string $model = TeamMember::class;

  protected static ?string $navigationIcon = 'heroicon-o-user-group';

  protected static ?string $navigationGroup = 'Médias';

  protected static ?int $navigationSort = 3;

  protected static ?string $modelLabel = 'Membre';

  protected static ?string $pluralModelLabel = 'Équipe';

  /**
   * Définit le formulaire de création/édition d'un membre.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Profil')
          ->schema([
            Forms\Components\TextInput::make('name')
              ->label('Nom')
              ->required()
              ->maxLength(255),
            Forms\Components\TextInput::make('role')
              ->label('Fonction')
              ->maxLength(255),
            Forms\Components\FileUpload::make('photo')
              ->label('Photo')
              ->image()
              ->disk('public')
              ->directory('team')
              ->visibility('public'),
            Forms\Components\TextInput::make('position')
              ->label('Ordre')
              ->numeric()
              ->default(0)
              ->required(),
          ])
          ->columns(2),
        Forms\Components\Section::make('Contact')
          ->schema([
            Forms\Components\TextInput::make('email')
              ->label('E-mail')
              ->email()
              ->maxLength(255),
            Forms\Components\TextInput::make('phone')
              ->label('Téléphone')
              ->tel()
              ->maxLength(255),
          ])
          ->columns(2),
      ]);
  }

  /**
   * Définit le tableau de liste des membres.
   *
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('photo')
          ->label('Photo')
          ->disk('public')
          ->circular(),
        Tables\Columns\TextColumn::make('name')
          ->label('Nom')
          ->searchable(),
        Tables\Columns\TextColumn::make('role')
          ->label('Fonction')
          ->searchable(),
        Tables\Columns\TextColumn::make('email')
          ->label('E-mail'),
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
      'index' => Pages\ListTeamMembers::route('/'),
      'create' => Pages\CreateTeamMember::route('/create'),
      'edit' => Pages\EditTeamMember::route('/{record}/edit'),
    ];
  }
}
