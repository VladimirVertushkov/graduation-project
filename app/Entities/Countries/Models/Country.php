<?php

namespace App\Entities\Countries\Models;

use App\Entities\Competitions\Models\Competition;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
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
    public $slug = 'country';

    /**
     * @var string
     */
    public $translated_title = 'Страна';

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
     *
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
     * @return HasMany
     */
    public function competitions(): HasMany
    {
        return $this->hasMany(Competition::class, 'country_id');
    }
}
