<?php

namespace App\Base\Traits;

trait WithCountable
{
    public function scopeFilteredWithCount($query, array $input = [])
    {
        $crossCount = array_uintersect($this->withCountEntities, $input, "strcasecmp");

        $query->withCount($crossCount);
    }
}
