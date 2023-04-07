<?php

namespace App\Entities\Groups\Models;


use App\Entities\Competitions\Models\Competition;
use App\Entities\Forecasts\Models\Forecast;
use App\Entities\Users\Models\User;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class
 *
 */
class Group extends Model
{
    use HasFactory;
    use Uuid;
    use SoftDeletes;

    /**
     * @var mixed|string
     */
    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var string
     */
    public $slug = 'group';

    /**
     * @var string
     */
    public $translated_title = 'группа';

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
    protected $casts = [];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @return BelongsTo
     */
    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    /**
     * @return BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_group')->withPivot('scores');
    }

    public function forecasts(): HasMany
    {
        return $this->hasMany(Forecast::class, 'user_id');
    }

    public function getUserBelongAttribute()
    {
        if(Auth::user() && in_array(Auth::user()->id, $this->users->pluck('id')->toArray())){
            return true;
        }else{
            return false;
        }
    }
}
