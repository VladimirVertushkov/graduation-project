<?php

namespace App\Entities\Competitions\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionGetResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'priority' => $this->priority,
            'country' => $this->country->name,
            'createdAt' => $this->created_at,
        ];
    }

}
