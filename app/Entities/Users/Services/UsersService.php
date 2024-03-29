<?php

namespace App\Entities\Users\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Auth\Services\AuthService;
use App\Entities\Countries\Models\Country;
use App\Entities\Users\Models\User;
use App\Entities\Users\Resources\UserGetForGroupResource;
use App\Entities\Users\Resources\UserGetResource;
use App\Entities\Users\Resources\UserShowResource;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Contracts\Auth\Authenticatable;

class UsersService extends ServiceBase
{
    private ?Authenticatable $authUser;

    public function __construct(public AuthService $authService)
    {
        parent::__construct();

        $this->authUser = Auth::user();
    }

    public function save(
        array  $data,
        string $id = null,
    ): array
    {

        $user = User::firstOrNew(['id' => $id]);

        $user->email = $data['email'] ?? '';
        $user->password = $data['password'] ? Hash::make($data['password']) : '';
        $user->name = $data['name'] ?? '';
        $user->date_of_birth = $data['dateOfBirth'] ?? '';

        $user->save();

        $token = $this->authService->login($data['email'], $data['password'], $data['deviceId']);

        return [
            'id' => $user->id,
            'token' => $token['token']
        ];
    }

    public function get(array $data)
    {
        $users = User::with('groups')
            ->get();

        return UserGetResource::collection($users)->toArray(request());
    }


    public function show(string $id)
    {
        $user = User::with(['groups' => function ($q) {
            $q->withCount('users');
        }])
            ->findOrFail($id);

        return new UserShowResource($user);
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function joinToGroup(array $data)
    {
        $user = Auth::user();
        $user->groups()->attach($data['groupId']);
    }

    public function leaveToGroup(array $data)
    {
        $user = Auth::user();
        $user->groups()->detach($data['groupId']);
    }

    public function getForGroup(array $data)
    {
        $users = User::with(['groups' => function($q) use ($data) {
            $q->where('id', $data['groupId']);
        }])
            ->get();

        return UserGetForGroupResource::collection($users)->toArray(request());
    }
}
