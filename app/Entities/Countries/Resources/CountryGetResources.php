<?php

namespace App\Entities\Countries\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryGetResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'createdAt' => $this->created_at,
        ];
    }
}
