<?php

namespace App\Http\Controllers\Admin\Subgenre;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Subgenre;
use App\Services\Subgenre\SubgenreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class SubgenreController extends Controller
{

    public function index()
    {
        $subgenres = Subgenre::query()->orderBy('name')
            ->with('genre')
            ->get();

        $genres = Genre::query()->orderBy('name', 'desc')->get();

        return Inertia::render('Admin/Subgenre/SubgenreIndexComponent', compact('subgenres', 'genres'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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

    public function show(string $id)
    {
        //
    }
    
    public function destroy(Subgenre $subgenre)
    {
        SubgenreService::destroy($subgenre);

        return redirect()->back()
            ->with('success', 'Поджанр успешно удален');
    }
}
