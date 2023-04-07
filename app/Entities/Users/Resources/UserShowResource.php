<?php

namespace App\Entities\Users\Resources;

use App\Entities\Groups\Resources\GroupGetForListResource;
use App\Entities\Groups\Resources\GroupShowResources;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->created_at,
            'birthday' => $this->date_of_birth,
            'groups' => $this->groups ? GroupGetForListResource::collection(($this->groups)) : null,
        ];
    }

}
