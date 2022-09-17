<?php

namespace App\Entities\Users\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Countries\Models\Country;
use App\Entities\Users\Models\User;
use App\Entities\Users\Resources\UserGetResource;
use Illuminate\Support\Facades\Hash;

class UsersService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct();
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

    public function get(array $data)
    {
        $users = User::get();

        return UserGetResource::collection($users)->toArray(request());
    }


    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return new UserGetResource($user);
    }
}
