<?php

namespace App\Entities\Groups\Resources;

use App\Entities\Users\Resources\UserGetResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupShowResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'admin' => [
                'id' => $this->admin->id,
                'name' => $this->admin->name,
                'email' => $this->admin->email,
                ],
            'competition' => $this->competition->name,
            'users' => UserGetResource::collection($this->users),
            'createdAt' => $this->created_at,
        ];
    }
}
