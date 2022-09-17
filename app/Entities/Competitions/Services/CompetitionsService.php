<?php

namespace App\Entities\Competitions\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Competitions\Models\Competition;
use App\Entities\Competitions\Resources\CompetitionGetResources;

class CompetitionsService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $data)
    {
        $competitions = Competition::with(['country'])
            ->get();

        return CompetitionGetResources::collection($competitions)->toArray(request());
    }

    public function show(string $id)
    {
        $competition = Competition::with(['country'])
        ->findOrFail($id);

        return new CompetitionGetResources($competition);
    }
}
