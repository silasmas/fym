<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers\RegistrationsRelationManager;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

/**
 * Ressource Filament pour gérer les événements.
 */
class EventResource extends Resource
{
  protected static ?string $model = Event::class;

  protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

  protected static ?string $navigationGroup = 'Événements';

  protected static ?int $navigationSort = 1;

  protected static ?string $modelLabel = 'Événement';

  protected static ?string $pluralModelLabel = 'Événements';

  /**
   * @param Form $form Instance du formulaire Filament
   * @return Form Formulaire configuré
   */
  public static function form(Form $form): Form
  {
    return $form
      ->schema([
        Forms\Components\Section::make('Informations')
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
            Forms\Components\DateTimePicker::make('start_at')
              ->label('Début')
              ->required(),
            Forms\Components\DateTimePicker::make('end_at')
              ->label('Fin'),
            Forms\Components\FileUpload::make('cover_image')
              ->label('Image de couverture')
              ->image()
              ->disk('public')
              ->directory('events')
              ->visibility('public'),
            Forms\Components\RichEditor::make('description')
              ->label('Description')
              ->columnSpanFull(),
            Forms\Components\Select::make('status')
              ->label('Statut')
              ->options([
                'draft' => 'Brouillon',
                'published' => 'Publié',
              ])
              ->default('draft')
              ->required(),
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
        Tables\Columns\ImageColumn::make('cover_image')
          ->label('Image')
          ->disk('public'),
        Tables\Columns\TextColumn::make('title')
          ->label('Titre')
          ->searchable(),
        Tables\Columns\TextColumn::make('location')
          ->label('Lieu'),
        Tables\Columns\TextColumn::make('start_at')
          ->label('Début')
          ->dateTime()
          ->sortable(),
        Tables\Columns\TextColumn::make('status')
          ->label('Statut')
          ->badge()
          ->formatStateUsing(fn (string $state): string => $state === 'published' ? 'Publié' : 'Brouillon')
          ->color(fn (string $state): string => $state === 'published' ? 'success' : 'gray'),
        Tables\Columns\TextColumn::make('registrations_count')
          ->label('Inscriptions')
          ->counts('registrations'),
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
   * @return array<class-string>
   */
  public static function getRelations(): array
  {
    return [
      RegistrationsRelationManager::class,
    ];
  }

  /**
   * @return array<string, class-string>
   */
  public static function getPages(): array
  {
    return [
      'index' => Pages\ListEvents::route('/'),
      'create' => Pages\CreateEvent::route('/create'),
      'edit' => Pages\EditEvent::route('/{record}/edit'),
    ];
  }
}
