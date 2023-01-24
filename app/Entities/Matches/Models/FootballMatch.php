<?php

namespace App\Entities\Matches\Models;

use App\Entities\Commands\Models\Command;
use App\Entities\Competitions\Models\Competition;
use App\Entities\Forecasts\Models\Forecast;
use App\Traits\Uuid;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FootballMatch extends Model
{
    use HasFactory;
    use Uuid;
    use Filterable;

    protected $table = 'matches';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * @var string
     */
    public $slug = 'match';

    /**
     * @var string
     */
    public $translated_title = 'матч';

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
        'command_first_id',
        'command_second_id',
        'winner_id',
        'command_first_goals',
        'command_second_goals',
        'status',
        'date_of_match',
    ];

    /**
     * @var array
     */
    protected $appends = [];

    /**
     * @return BelongsTo
     */
    public function commandFirst(): BelongsTo
    {
        return $this->belongsTo(Command::class, 'command_first_id');
    }

    public function commandSecond(): BelongsTo
    {
        return $this->belongsTo(Command::class, 'command_second_id');
    }

    public function winner(): BelongsTo
    {
        return $this->belongsTo(Command::class, 'winner_id');
    }

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    public function forecasts(): HasMany
    {
        return $this->hasMany(Forecast::class, 'match_id');
    }
}
