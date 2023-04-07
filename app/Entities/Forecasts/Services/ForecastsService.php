<?php

namespace App\Entities\Forecasts\Services;

use App\Base\Services\ServiceBase;
use App\Entities\Auth\Services\AuthService;
use App\Entities\Forecasts\Models\Forecast;
use Illuminate\Support\Facades\Auth;

class ForecastsService extends ServiceBase
{
    public function __construct(public AuthService $authService)
    {
        parent::__construct();

        $this->authUser = Auth::user();
    }

    public function create(array $data)
    {
        $user = Auth::user();
        $forecast = new Forecast();
        $forecast->command_first_goals = $data['commandFirstGoals'];
        $forecast->command_second_goals = $data['commandSecondGoals'];
        $forecast->match_id = $data['matchId'];
        $forecast->group_id = $data['groupId'];
        $forecast->winner_id = $data['winnerId'];
        $forecast->user_id = $user->id;
        $forecast->save();

        return $forecast->id;

    }
}
