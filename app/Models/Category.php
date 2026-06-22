<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Représente une catégorie d'articles de blog.
 */
class Category extends Model
{
  /**
   * Attributs assignables en masse.
   *
   * @var list<string>
   */
  protected $fillable = [
    'name',
    'slug',
  ];

  /**
   * Retourne les articles associés à cette catégorie.
   *
   * @return BelongsToMany<Post, $this>
   */
  public function posts(): BelongsToMany
  {
    return $this->belongsToMany(Post::class);
  }
}
