<?php

namespace App\Entities\OauthAccessTokens\Jobs;

use App\Entities\DeviceTokens\Models\DeviceToken;
use App\Entities\OauthAccessTokens\Models\OauthAccessToken;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class DeleteOldOauthAndDeviceTokensJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * Выполнение задачи.
     *
     */
    public function handle()
    {
        $oauthTokens = OauthAccessToken::where('expires_at', '<', Carbon::now());
        $tokenIds = $oauthTokens->pluck('device_token_id');

        if (count($tokenIds) > 0) {
            DB::transaction(function () use ($oauthTokens, $tokenIds) {
                $oauthTokens->delete();
                DeviceToken::whereIn('id', $tokenIds)->delete();
            });
        }
    }
}
