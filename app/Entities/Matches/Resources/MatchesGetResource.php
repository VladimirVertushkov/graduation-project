<?php

namespace App\Entities\Matches\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MatchesGetResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'commandFirst' => $this->commandFirst !== null ? [
                'id' => $this->commandFirst->id,
                'name' => $this->commandFirst->name,
                'goals' => $this->command_first_goals,
                ] : null,
            'commandSecond' => $this->commandSecond !== null ? [
                'id' => $this->commandSecond->id,
                'name' => $this->commandSecond->name,
                'goals' => $this->command_second_goals,
                ] : null,
            'winner' => $this->winner !== null ? [
                    'id' => $this->winner->id,
                    'name' => $this->winner->name,
                ] : null,
            'competition' => $this->competition !== null ? [
                    'id' => $this->competition->id,
                    'name' => $this->competition->name,
                ] : null,
            'status' => $this->status,
            'dateOfMatch' => date('d.m.Y', strtotime($this->date_of_match)),
        ];
    }
}
