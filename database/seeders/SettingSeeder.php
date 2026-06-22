<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * Seeder unique regroupant tous les paramètres du site (table settings).
 */
class SettingSeeder extends Seeder
{
  /**
   * Retourne la liste complète des paramètres par défaut du site FYM.
   *
   * @return array<string, string> Clés et valeurs des paramètres
   */
  public static function defaults(): array
  {
    return [
      // SEO
      'seo_default_description' => 'Fondation Yves Milan Ngangay — association caritative et humanitaire en République Démocratique du Congo.',
      'seo_home_description' => 'Portail officiel de la Fondation Yves Milan : actions humanitaires, projets sociaux et événements en RDC.',

      // Contact
      'contact_address' => 'Kinshasa, République Démocratique du Congo',
      'contact_email' => 'silasjmas@gmail.com',
      'contact_phone' => '+243',
      'contact_intro' => 'La Fondation Yves Milan est à votre écoute pour toute question ou collaboration.',

      // À propos
      'about_intro' => 'Nous agissons au service des populations les plus vulnérables à travers des actions humanitaires durables.',
      'about_mission' => 'Apporter une aide concrète aux communautés dans le besoin, en menant des actions caritatives, éducatives et sociales sur le territoire congolais.',
      'about_vision' => 'Bâtir une société plus solidaire où chaque personne a accès aux ressources essentielles pour vivre dans la dignité.',
      'about_footer' => 'La Fondation Yves Milan œuvre pour le bien-être des communautés à travers des actions caritatives et humanitaires.',

      // Services
      'services_intro' => 'La Fondation Yves Milan mène des actions humanitaires et caritatives au service des populations.',

      // Horaires & carte
      'opening_hours' => 'Lundi - Vendredi, 08h00 - 17h00',
      'map_embed_url' => 'https://maps.google.com/maps?q=Kinshasa%2C%20RDC&t=&z=13&ie=UTF8&iwloc=&output=embed',

      // Statistiques page d'accueil
      'stat_1_value' => '50',
      'stat_1_label' => 'Projets réalisés',
      'stat_2_value' => '1200',
      'stat_2_label' => 'Bénéficiaires',
      'stat_3_value' => '25',
      'stat_3_label' => 'Partenaires',
      'stat_4_value' => '15',
      'stat_4_label' => 'Années d\'engagement',

      // Réseaux sociaux (laisser vide si non utilisé)
      'facebook_url' => '',
      'twitter_url' => '',
      'linkedin_url' => '',
      'youtube_url' => '',
    ];
  }

  /**
   * Exécute le seeding de tous les paramètres du site.
   *
   * @return void
   */
  public function run(): void
  {
    foreach (self::defaults() as $key => $value) {
      Setting::query()->updateOrCreate(['key' => $key], ['value' => $value]);
    }
  }
}
