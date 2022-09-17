<?php

namespace App\Entities\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserGetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fullName' => $this->name,
            'createdAt' => $this->created_at,
            'birthday' => $this->date_of_birth,
        ];
    }

}
