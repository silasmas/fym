<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Ressource Filament pour gérer les pages de contenu CMS.
 */
class PageResource extends Resource
{
  protected static ?string $model = Page::class;

  protected static ?string $navigationIcon = 'heroicon-o-document-text';

  protected static ?string $navigationGroup = 'Contenu';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Page';

  protected static ?string $pluralModelLabel = 'Pages';

  /**
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
              ->required()
              ->maxLength(255)
              ->live(onBlur: true)
              ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
            Forms\Components\TextInput::make('slug')
              ->label('Slug')
              ->required()
              ->maxLength(255)
              ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('subtitle')
              ->label('Sous-titre')
              ->maxLength(255),
            Forms\Components\FileUpload::make('cover_image')
              ->label('Image de couverture')
              ->image()
              ->disk('public')
              ->directory('pages')
              ->visibility('public'),
            Forms\Components\RichEditor::make('content')
              ->label('Contenu')
              ->columnSpanFull(),
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
        Tables\Columns\TextColumn::make('title')
          ->label('Titre')
          ->searchable(),
        Tables\Columns\TextColumn::make('slug')
          ->label('Slug')
          ->searchable(),
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
      'index' => Pages\ListPages::route('/'),
      'create' => Pages\CreatePage::route('/create'),
      'edit' => Pages\EditPage::route('/{record}/edit'),
    ];
  }
}
