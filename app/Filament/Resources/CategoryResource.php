<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

/**
 * Ressource Filament pour gérer les catégories d'articles.
 */
class CategoryResource extends Resource
{
  protected static ?string $model = Category::class;

  protected static ?string $navigationIcon = 'heroicon-o-tag';

  protected static ?string $navigationGroup = 'Contenu';

  protected static ?int $navigationSort = 3;

  protected static ?string $modelLabel = 'Catégorie';

  protected static ?string $pluralModelLabel = 'Catégories';

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
          ->maxLength(255)
          ->live(onBlur: true)
          ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
        Forms\Components\TextInput::make('slug')
          ->label('Slug')
          ->required()
          ->maxLength(255)
          ->unique(ignoreRecord: true),
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
        Tables\Columns\TextColumn::make('slug')
          ->label('Slug')
          ->searchable(),
        Tables\Columns\TextColumn::make('posts_count')
          ->label('Articles')
          ->counts('posts'),
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
      'index' => Pages\ListCategories::route('/'),
      'create' => Pages\CreateCategory::route('/create'),
      'edit' => Pages\EditCategory::route('/{record}/edit'),
    ];
  }
}
