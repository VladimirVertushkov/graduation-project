<?php

namespace App\Entities\Forecasts\Models;

use App\Entities\Commands\Models\Command;
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
    ];

    /**
     * @var array
     */
    protected $appends = [];

//    public function forecasts(): HasMany
//    {
//        return $this->hasMany(Forecast::class);
//    }
}

