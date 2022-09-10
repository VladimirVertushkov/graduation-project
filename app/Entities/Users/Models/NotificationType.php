<?php

namespace App\Entities\Users\Models;

use App\Base\Models\BaseModel as BaseModel;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class NotificationType
 *
 */
class NotificationType extends BaseModel
{
    public $incrementing = false;
    use Uuid;
    protected $fillable = [

    ];

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_notification_type')
            ->withPivot('id');
    }
}
