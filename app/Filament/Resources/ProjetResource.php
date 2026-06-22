<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjetResource\Pages;
use App\Filament\Resources\ProjetResource\RelationManagers\PhotosRelationManager;
use App\Models\Projet;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Ressource Filament pour gérer les projets et réalisations.
 */
class ProjetResource extends Resource
{
  protected static ?string $model = Projet::class;

  protected static ?string $navigationIcon = 'heroicon-o-briefcase';

  protected static ?string $navigationGroup = 'Projets';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Projet';

  protected static ?string $pluralModelLabel = 'Projets';

  /**
   * Définit le formulaire de création/édition d'un projet.
   *
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Informations générales')
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
            Forms\Components\TextInput::make('location')
              ->label('Lieu')
              ->maxLength(255),
            Forms\Components\Select::make('status')
              ->label('Statut')
              ->options([
                'planned' => 'Planifié',
                'ongoing' => 'En cours',
                'completed' => 'Terminé',
              ])
              ->default('planned')
              ->required(),
            Forms\Components\DatePicker::make('start_date')
              ->label('Date de début'),
            Forms\Components\DatePicker::make('end_date')
              ->label('Date de fin'),
            Forms\Components\TextInput::make('budget')
              ->label('Budget')
              ->numeric()
              ->prefix('€'),
            Forms\Components\FileUpload::make('cover_image')
              ->label('Image de couverture')
              ->image()
              ->disk('public')
              ->directory('projets/covers')
              ->visibility('public'),
            Forms\Components\RichEditor::make('description')
              ->label('Description')
              ->columnSpanFull(),
          ])
          ->columns(2),
        Forms\Components\Section::make('Publication & SEO')
          ->schema([
            Forms\Components\DateTimePicker::make('published_at')
              ->label('Date de publication'),
            Forms\Components\TextInput::make('seo_title')
              ->label('Titre SEO')
              ->maxLength(255),
            Forms\Components\Textarea::make('seo_description')
              ->label('Description SEO')
              ->rows(3)
              ->columnSpanFull(),
            Forms\Components\Hidden::make('created_by')
              ->default(fn () => Auth::id()),
          ])
          ->columns(2),
      ]);
  }

  /**
   * Définit le tableau de liste des projets.
   *
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('cover_image')
          ->label('Couverture')
          ->disk('public'),
        Tables\Columns\TextColumn::make('title')
          ->label('Titre')
          ->searchable(),
        Tables\Columns\TextColumn::make('location')
          ->label('Lieu')
          ->toggleable(),
        Tables\Columns\TextColumn::make('status')
          ->label('Statut')
          ->badge()
          ->formatStateUsing(fn (string $state): string => match ($state) {
            'planned' => 'Planifié',
            'ongoing' => 'En cours',
            'completed' => 'Terminé',
            default => $state,
          })
          ->color(fn (string $state): string => match ($state) {
            'ongoing' => 'warning',
            'completed' => 'success',
            default => 'gray',
          }),
        Tables\Columns\TextColumn::make('published_at')
          ->label('Publié le')
          ->dateTime()
          ->sortable(),
      ])
      ->filters([
        Tables\Filters\SelectFilter::make('status')
          ->label('Statut')
          ->options([
            'planned' => 'Planifié',
            'ongoing' => 'En cours',
            'completed' => 'Terminé',
          ]),
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
   * Retourne les gestionnaires de relations associés.
   *
   * @return array<class-string>
   */
  public static function getRelations(): array
  {
    return [
      PhotosRelationManager::class,
    ];
  }

  /**
   * Retourne les pages associées à la ressource.
   *
   * @return array<string, class-string>
   */
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListProjets::route('/'),
      'create' => Pages\CreateProjet::route('/create'),
      'edit' => Pages\EditProjet::route('/{record}/edit'),
    ];
  }
}
