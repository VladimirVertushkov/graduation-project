<?php

namespace App\Entities\Groups\Models;


use App\Entities\Competitions\Models\Competition;
use App\Entities\Users\Models\User;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class
 *
 */
class Group extends Model
{
    use HasFactory;
    use Uuid;

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
        return $this->belongsToMany(Group::class, 'user_group');
    }
}
