<?php

namespace App\Entities\Groups\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupGetForListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'usersCount' => $this->users_count,
            'score' => $this->pivot->scores,
        ];
    }
}
