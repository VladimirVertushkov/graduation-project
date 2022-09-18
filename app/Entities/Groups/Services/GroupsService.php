<?php

namespace App\Entities\Groups\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Groups\Models\Group;
use App\Entities\Groups\Resources\GroupGetResources;
use App\Entities\Groups\Resources\GroupShowResources;


class GroupsService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $all)
    {
        $groups = Group::with(['competition', 'admin'])
            ->get();

        return GroupGetResources::collection($groups)->toArray(request());
    }

    public function show(string $id)
    {
        $group = Group::with(['competition', 'admin', 'users'])
            ->findOrFail($id);

        return new GroupShowResources($group);
    }

}