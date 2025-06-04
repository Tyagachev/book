<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genre extends Model
{
    protected $table = 'genres';
    protected $guarded = [];

    /**
     * Список поджанров
     *
     * @return HasMany
     */
    public function subgenres(): HasMany
    {
        return $this->hasMany(Subgenre::class);
    }
}
