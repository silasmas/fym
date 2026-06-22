<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Secret de déploiement distant
  |--------------------------------------------------------------------------
  |
  | Clé requise pour l'assistant d'installation (/install) et POST /deploy/init.
  | Générez une valeur longue et aléatoire en production.
  |
  */
  'secret' => env('DEPLOY_SECRET'),

  /*
  |--------------------------------------------------------------------------
  | Compte administrateur par défaut (AdminSeeder)
  |--------------------------------------------------------------------------
  */
  'admin_email' => env('ADMIN_EMAIL', 'silasjmas@gmail.com'),
  'admin_password' => env('ADMIN_PASSWORD', 'silasmas'),
  'admin_name' => env('ADMIN_NAME', 'Administrateur FYM'),

  /*
  |--------------------------------------------------------------------------
  | Seeders disponibles pour le déploiement
  |--------------------------------------------------------------------------
  |
  | Clé => classe Seeder. Utilisé par le dashboard et l'endpoint /deploy/init.
  |
  */
  'seeders' => [
    'settings' => \Database\Seeders\SettingSeeder::class,
    'admin' => \Database\Seeders\AdminSeeder::class,
  ],

  /*
  |--------------------------------------------------------------------------
  | Tâches de déploiement disponibles
  |--------------------------------------------------------------------------
  */
  'tasks' => [
    'migrations' => 'Exécuter les migrations',
    'storage_link' => 'Créer le lien symbolique storage',
    'shield_permissions' => 'Générer les permissions Shield',
    'super_admin' => 'Attribuer le rôle super_admin à l\'admin',
  ],

];
