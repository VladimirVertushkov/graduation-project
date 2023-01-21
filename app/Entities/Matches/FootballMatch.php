<?php

namespace App\Entities\Matches;

use App\Entities\Commands\Models\Command;
use App\Entities\Countries\Models\Country;
use App\Entities\Groups\Models\Group;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FootballMatch extends Model
{
    use HasFactory;
    use Uuid;

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
        return $this->belongsTo(Command::class);
    }

    public function commandSecond(): BelongsTo
    {
        return $this->belongsTo(Command::class);
    }
}
