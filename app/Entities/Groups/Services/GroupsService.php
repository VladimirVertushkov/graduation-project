<?php

namespace App\Entities\Groups\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Groups\Models\Group;
use App\Entities\Groups\Resources\GroupGetResources;
use App\Entities\Groups\Resources\GroupShowResources;
use Illuminate\Support\Facades\Auth;


class GroupsService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct();

        $this->user = Auth::user();
    }

    public function get(array $data)
    {
        $user = Auth::user();
        $groups = Group::with(['competition', 'admin',
            'users' => function($q){
            $q->select('id');
            }])
            ->withCount('users')
            ->get();

        foreach ($groups as $group){
            if($user && in_array($user->id, $group->users->pluck('id')->toArray())){
                $group->userBelong = true;
            }else{
                $group->userBelong = false;
            }
        }

        return GroupGetResources::collection($groups)->toArray(request());
    }

    public function show(string $id)
    {
        $group = Group::with(['competition', 'admin', 'users'])
            ->withCount('users')
            ->findOrFail($id);

        if($this->user && in_array($this->user->id, $group->users->pluck('id')->toArray())){
            $group->userBelong = true;
        }else{
            $group->userBelong = false;
        }

        return new GroupShowResources($group);
    }

    public function create(array $data)
    {
        $group = new Group;
        $group->name = $data['name'];
        $group->admin_id = Auth::user()->id;
        $group->competition_id = $data['competitionId'];
        $group->save();
        $userId = Auth::user()->id;
        $group->users()->attach($userId);

        return $group->id;

    }

    public function delete(string $id)
    {
        Group::find($id)->delete();
    }

}
