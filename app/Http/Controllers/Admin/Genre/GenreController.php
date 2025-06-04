<?php

namespace App\Http\Controllers\Admin\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Services\Genre\GenreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;

class GenreController extends Controller
{

    /**
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $genres = Genre::query()->orderBy('name')
            ->with('subgenres')
            ->get();

        return Inertia::render('Admin/Genre/GenreIndexComponent', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:genres,name',
        ], [
            'name.required' => 'Название жанра обязательно',
            'name.unique' => 'Жанр с таким названием уже существует'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        GenreService::store($request->only('name'));

        return redirect()->back()->with('success', 'Жанр добавлен успешно');
   }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * @param Genre $genre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Genre $genre): RedirectResponse
    {
        GenreService::destroy($genre);

        return redirect()->back()
            ->with('success', 'Жанр успешно удален');
    }
}
