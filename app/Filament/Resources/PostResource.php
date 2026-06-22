<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Ressource Filament pour gérer les articles et actualités.
 */
class PostResource extends Resource
{
  protected static ?string $model = Post::class;

  protected static ?string $navigationIcon = 'heroicon-o-newspaper';

  protected static ?string $navigationGroup = 'Contenu';

  protected static ?int $navigationSort = 2;

  protected static ?string $modelLabel = 'Article';

  protected static ?string $pluralModelLabel = 'Articles';

  /**
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Article')
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
            Forms\Components\Textarea::make('excerpt')
              ->label('Extrait')
              ->rows(3)
              ->maxLength(500)
              ->columnSpanFull(),
            Forms\Components\FileUpload::make('thumbnail')
              ->label('Miniature')
              ->image()
              ->disk('public')
              ->directory('posts')
              ->visibility('public'),
            Forms\Components\RichEditor::make('content')
              ->label('Contenu')
              ->columnSpanFull(),
            Forms\Components\Select::make('categories')
              ->label('Catégories')
              ->relationship('categories', 'name')
              ->multiple()
              ->preload(),
          ])
          ->columns(2),
        Forms\Components\Section::make('Publication & SEO')
          ->schema([
            Forms\Components\Select::make('status')
              ->label('Statut')
              ->options([
                'draft' => 'Brouillon',
                'published' => 'Publié',
              ])
              ->default('draft')
              ->required(),
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
   * @param Table $table Instance du tableau Filament
   * @return Table Tableau configuré
   */
  public static function table(Table $table): Table
  {
    return $table
      ->columns([
        Tables\Columns\ImageColumn::make('thumbnail')
          ->label('Miniature')
          ->disk('public'),
        Tables\Columns\TextColumn::make('title')
          ->label('Titre')
          ->searchable(),
        Tables\Columns\TextColumn::make('categories.name')
          ->label('Catégories')
          ->badge(),
        Tables\Columns\TextColumn::make('status')
          ->label('Statut')
          ->badge()
          ->formatStateUsing(fn (string $state): string => $state === 'published' ? 'Publié' : 'Brouillon')
          ->color(fn (string $state): string => $state === 'published' ? 'success' : 'gray'),
        Tables\Columns\TextColumn::make('published_at')
          ->label('Publié le')
          ->dateTime()
          ->sortable(),
      ])
      ->filters([
        Tables\Filters\SelectFilter::make('status')
          ->label('Statut')
          ->options([
            'draft' => 'Brouillon',
            'published' => 'Publié',
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
   * @return array<string, class-string>
   */
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListPosts::route('/'),
      'create' => Pages\CreatePost::route('/create'),
      'edit' => Pages\EditPost::route('/{record}/edit'),
    ];
  }
}
