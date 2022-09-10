<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Trait Uuid
 * Трейт для назначения UUID в качестве primary key
 *
 * @package App\Traits
 */
trait Uuid
{
    /**
     * Функция загрузки из laravel.
     */
    protected static function bootUuid()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });
    }
}
