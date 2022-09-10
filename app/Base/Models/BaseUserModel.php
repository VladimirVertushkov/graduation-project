<?php

namespace App\Base\Models;

use App\Traits\Uuid;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Базовая модель для пользователей
 *
 * Class BaseUserModel
 * @package App\Base\Models
 */
abstract class BaseUserModel extends Authenticatable
{
    use Uuid;

    /**
     * @var bool
     */
    public $incrementing = false;
    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

}
