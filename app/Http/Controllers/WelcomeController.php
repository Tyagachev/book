<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        $login = Auth::user();
        $user = User::query()->find(Auth::user());

        return Inertia::render('Welcome', [
            'canLogin' => $login ? true : false,
            'canRegister' => $user ? false : true,
            'laravelVersion' => '11',
            'phpVersion' => phpversion()
            ]);
    }
}
