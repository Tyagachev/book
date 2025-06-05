<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Services\User\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    /**
     * Список пользователей
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $users = User::query()
            ->with('roles')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Admin/User/UserIndexComponent', compact('users'));
    }

    /**
     * Страница создания пользователя
     *
     * @return \Inertia\Response
     */
    public function create(): Response
    {
        $roles = Role::all();
        return Inertia::render('Admin/User/UserCreateComponent', compact('roles'));
    }

    /**
     * Запись пользователя
     * в БД
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed'],
            'role' => 'required',
        ], [
            'name.required' => 'Поле обязательно для заполнения',
            'email.required' => 'Поле обязательно для заполнения',
            'email.unique' => 'Такой Email уже существует',
            'password.required' => 'Поле обязательно для заполнения',
            'password.confirmed' => 'Пароли не совпадают',
            'role.required' => 'Поле обязательно для заполнения'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        UserService::store($request->all());

        return redirect()->route('user.index')
            ->with('success', 'Пользователь добавлен успешно');
    }

    /**
     * Просмотр карточки
     * пользователя
     *
     * @param User $user
     * @return \Inertia\Response
     */
    public function show(User $user): Response
    {
        $user = User::query()->find($user['id']);
        $u = [
            'name' => $user['name'],
            'email' => $user['email'],
            'role' => $user->roles
        ];
        return Inertia::render('Admin/User/UserShowComponent', compact('u'));
    }

    /**
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Удаление пользователя
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        UserService::destroy($user);

        return redirect()
            ->back()
            ->with('success', 'Пользователь успешно удалён');
    }
}
