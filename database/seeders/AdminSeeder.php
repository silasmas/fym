<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Crée ou met à jour le compte administrateur principal.
 */
class AdminSeeder extends Seeder
{
  /**
   * Exécute le seeding du compte administrateur.
   *
   * @return void
   */
  public function run(): void
  {
    User::query()->where('email', 'admin@fym.org')->delete();

    $admin = User::query()->updateOrCreate(
      ['email' => config('deploy.admin_email')],
      [
        'name' => config('deploy.admin_name'),
        'password' => Hash::make(config('deploy.admin_password')),
        'email_verified_at' => now(),
      ]
    );

    if (! $admin->hasRole('super_admin')) {
      $admin->assignRole('super_admin');
    }
  }
}
