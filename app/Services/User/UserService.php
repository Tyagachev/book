<?php

namespace App\Services\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Inertia\Testing\Concerns\Has;

class UserService
{
    /**
     * Добавление юзера
     *
     * @param array $data
     * @return mixed
     */
    public static function store(array $data): mixed
    {
        $user = User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $role = Role::query()->find($data['role']);
        return $user->roles()->attach($role);
    }

    /**
     * Удаление юзера и ролей
     *
     * @param object $user
     * @return mixed
     */
    public static function destroy(object $user): mixed
    {
        $roleIdx = [];

        foreach ($user['roles'] as $u) {
            $roleIdx[] = $u->id;
        }

        $user->roles()->detach($roleIdx);
        return $user->delete();
    }
}
