<?php

namespace App\Entities\Users\Models;

use App\Base\Models\BaseUserModel;
use App\Entities\Forecasts\Models\Forecast;
use App\Entities\Groups\Models\Group;
use Eloquent;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class User
 *
 */
class User extends BaseUserModel
{
    use Notifiable;
    //use SoftDeletes;
    //use CanResetPassword;
    use HasApiTokens;
    use HasFactory;

    protected $primaryKey = 'id';

    /**
     * @var string
     */
    public $slug = 'user';

    /**
     * @var string
     */
    public $translated_title = 'Пользователь';

    /**
     * @var string[]
     */
    public $available_fields = [];

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var string[]
     */
    protected $deleting_relations = [];

    /**
     * @var string[]
     */
    protected $nullable_relations = [];
    /**
     * @var string[]
     */
    protected $pivot_relations = [];

    /**
     * @var string[]
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'name',
        'date_of_birth',
    ];

    /**
     * @var array
     */
    protected $appends = [];


    /**
     * @return HasMany
     */
    public function forecasts(): HasMany
    {
        return $this->hasMany(Forecast::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function admin_groups(): HasMany
    {
        return $this->hasMany(Group::class, 'admin_id');
    }

    /**
     * @return BelongsToMany
     */
    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'user_group');
    }
}
