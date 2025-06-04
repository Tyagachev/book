<?php

namespace App\Services\Subgenre;

use App\Models\Subgenre;

class SubgenreService
{
    /**
     * Запись в БД
     * @param array $data
     * @return mixed
     */
    public static function store(array $data): mixed
    {

        return Subgenre::query()->create([
            'name' => $data['name'],
            'genre_id' => $data['genreId']
        ]);
    }

    /**
     * Удаление
     *
     * @param object $subgenre
     * @return mixed
     */
    public static function destroy(object $subgenre): mixed
    {
        return $subgenre->delete();
    }
}
