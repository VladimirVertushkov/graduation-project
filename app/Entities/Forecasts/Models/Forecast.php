<?php

namespace App\Entities\Forecasts\Models;

use App\Entities\Commands\Models\Command;
use App\Entities\Groups\Models\Group;
use App\Entities\Matches\Models\FootballMatch;
use App\Entities\Users\Models\User;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class
 *
 */
class Forecast extends Model
{
    use HasFactory;
    use Uuid;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var string
     */
    public $slug = 'forecast';

    /**
     * @var string
     */
    public $translated_title = 'прогноз';

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
        'command_first_goals',
        'command_second_goals',
        'match_id',
        'user_id',
        'group_id',
        'winner_id'
    ];

    /**
     * @var array
     */
    protected $appends = [];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function group(): belongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function match(): belongsTo
    {
        return $this->belongsTo(FootballMatch::class);
    }

    public function winner(): belongsTo
    {
        return $this->belongsTo(Command::class, 'winner_id');
    }
}

