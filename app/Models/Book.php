<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Book extends Model
{
    protected $table = 'books';
    protected $guarded = [];

    /**
     * Текст книги
     *
     * @return HasOne
     */
    public function text(): HasOne
    {
        return $this->hasOne(Text::class);
    }

    /**
     * Поджанр книги
     *
     * @return BelongsTo
     */
    public function subgenre(): BelongsTo
    {
        return $this->belongsTo(Subgenre::class);
    }

    /**
     * Доступ к жанру через поджанр
     *
     * @return mixed
     */
    public function getGenreAttribute(): mixed
    {
        return $this->subgenre->genre;
    }
}
