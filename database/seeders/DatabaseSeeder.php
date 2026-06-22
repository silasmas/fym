<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Lance les seeders de l'application.
   *
   * @return void
   */
  public function run(): void
  {
    $this->call([
      SettingSeeder::class,
      AdminSeeder::class,
    ]);
  }
}
