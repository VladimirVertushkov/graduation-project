<?php

namespace App\Entities\Groups\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupGetResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'admin' => [
                'id' => $this->admin->id,
                'name' => $this->admin->name,
            ],
            'competition' => $this->competition->name,
            'createdAt' => date('d.m.Y', strtotime($this->created_at)),
        ];
    }
}
