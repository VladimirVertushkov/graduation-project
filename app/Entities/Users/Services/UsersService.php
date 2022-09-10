<?php

namespace App\Entities\Users\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Users\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersService extends ServiceBase
{

    public function show(string $id)
    {

    }

    public function save(
        array $data,
        string $id = null,
    ): string {

        $user = User::firstOrNew(['id' => $id]);

        $user->email = $data['email'] ?? '';
        $user->password = $data['password'] ? Hash::make($data['password']) : '';
        $user->name = $data['name'] ?? '';
        $user->date_of_birth = $data['dateOfBirth'] ?? '';

        $user->save();

        return $user->id;
    }
}
