<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Représente un message reçu via le formulaire de contact.
 */
class Contact extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'email',
    'phone',
    'subject',
    'message',
  ];
}
