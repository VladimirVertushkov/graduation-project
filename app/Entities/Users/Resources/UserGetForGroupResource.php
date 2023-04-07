<?php

namespace App\Entities\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserGetForGroupResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->created_at,
            'birthday' => $this->date_of_birth,
            'score' => !empty($this->groups->toArray()) ? $this->groups[0]->pivot->scores : null,
        ];
    }
}
