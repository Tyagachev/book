<?php

namespace App\Services\Genre;

use App\Models\Genre;

class GenreService
{
    /**
     * Запись в БД
     *
     * @param array $name
     * @return mixed
     */
    public static function store(array $name): mixed
    {
        return Genre::query()->create($name);
    }

    /**
     * Удаление
     *
     * @param object $genre
     * @return mixed
     */
    public static function destroy(object $genre): mixed
    {
        return $genre->delete();
    }
}
