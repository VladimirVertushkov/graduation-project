<?php

namespace App\Entities\Matches\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Groups\Models\Group;
use App\Entities\Groups\Resources\GroupGetResources;
use App\Entities\Matches\Filters\MatchesFilter;
use App\Entities\Matches\Models\FootballMatch;
use App\Entities\Matches\Resources\MatchesGetResource;
use Illuminate\Support\Facades\Auth;

class MatchesService extends ServiceBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(array $data)
    {
        $user = Auth::user();
        $matches = FootballMatch::with([
            'forecasts',
            'commandFirst',
            'commandSecond',
            'competition',
            'winner',
            'forecasts' => function ($q) use ($data, $user) {
                $q->where('group_id', $data['groupId'])
                    ->where('user_id', $user->id);
            }
        ])
            ->filter($data, MatchesFilter::class)
            ->orderBy('date_of_match')
            ->get();

        return MatchesGetResource::collection($matches)->toArray(request());

    }
}
