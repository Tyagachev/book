<?php

namespace App\Http\Controllers\Admin\Subgenre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Subgenre;
use App\Services\Subgenre\SubgenreService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;

class SubgenreController extends Controller
{

    /**
     * Страница поджанров
     *
     * @return \Inertia\Response
     */
    public function index():Response
    {
        $subgenres = Subgenre::query()->orderBy('name')
            ->with('genre')
            ->get();

        $genres = Genre::query()->orderBy('name', 'desc')->get();

        return Inertia::render('Admin/Subgenre/SubgenreIndexComponent', compact('subgenres', 'genres'));
    }

    /**
     * Запись поджанра
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|unique:subgenres,name',
        ],[
            'name.required' => 'Название поджанра обязательно',
            'name.unique' => 'Поджанр с таким названием уже существует'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        SubgenreService::store($request->all());

        return redirect()->back()->with('success', 'Поджанр успешно создан');
    }

    /**
     * @param string $id
     * @return void
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Удаление поджанра
     *
     * @param Subgenre $subgenre
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Subgenre $subgenre): RedirectResponse
    {
        SubgenreService::destroy($subgenre);

        return redirect()->back()
            ->with('success', 'Поджанр успешно удален');
    }
}
