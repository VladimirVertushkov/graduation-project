<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

interface DTOInterface
{
    /**
     * @param  Request  $request
     * @return self
     * @throws UnknownProperties
     */
    public static function fromRequest(Request $request);

    /**
     * @param $model
     * @return self
     * @throws UnknownProperties
     */
    public static function fromModel($model);
}