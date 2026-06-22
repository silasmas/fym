<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Représente une inscription à un événement.
 */
class EventRegistration extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'event_id',
    'name',
    'email',
    'phone',
    'message',
  ];

  /**
   * Retourne l'événement associé à l'inscription.
   *
   * @return BelongsTo<Event, $this>
   */
  public function event(): BelongsTo
  {
    return $this->belongsTo(Event::class);
  }
}
