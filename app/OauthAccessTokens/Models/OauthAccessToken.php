<?php

namespace App\Entities\OauthAccessTokens\Models;

use App\Base\Models\BaseModel;
use App\Entities\Deletions\Traits\Deletable;

/**
 * App\Entities\OauthAccessTokens\Models\OauthAccessToken
 *
 * @property string $id
 * @property string|null $user_id
 * @property string $client_id
 * @property string|null $name
 * @property string|null $scopes
 * @property int $revoked
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $expires_at
 * @property string|null $device_token_id Идинтификатор токена устройства
 * @property-read \App\Entities\Deletions\Models\Deletion|null $deletion
 * @property-read mixed $closed_at
 * @property-read mixed $deleted_at
 * @property-read mixed $next_run_at
 * @property-read mixed $sent_to_engineer_at
 * @property-read mixed $set_external_at
 * @property-read mixed $translated_title
 * @property-read mixed $written_off_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\App\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereDeviceTokenId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereScopes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $device_unique_id Уникальный идентификатор
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken whereDeviceUniqueId($value)
 */
class OauthAccessToken extends BaseModel
{
    use Deletable;

    public $available_fields = [];

    protected $fillable = [];
}