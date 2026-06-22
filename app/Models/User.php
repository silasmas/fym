<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Modèle utilisateur pour l'authentification web et l'accès au panel Filament.
 */
class User extends Authenticatable implements FilamentUser
{
  /** @use HasFactory<\Database\Factories\UserFactory> */
  use HasFactory, HasRoles, Notifiable;

  protected $guard_name = 'web';

  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * Attributs masqués lors de la sérialisation.
   *
   * @var list<string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * Détermine si l'utilisateur peut accéder au panel Filament.
   *
   * @param Panel $panel Panel Filament cible
   * @return bool True si l'utilisateur a un rôle autorisé
   */
  public function canAccessPanel(Panel $panel): bool
  {
    if ($panel->getId() !== 'admin') {
      return false;
    }

    return $this->hasAnyRole(['super_admin', 'panel_user']);
  }

  /**
   * Retourne les casts des attributs du modèle.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }
}

