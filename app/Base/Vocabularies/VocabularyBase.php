<?php

namespace App\Base\Vocabularies;

use ReflectionClass;

/**
 * Базовый класс для словарей
 *
 * Class VocabularyBase
 * @package App\Base\Vocabularies
 */
class VocabularyBase
{
    /**
     * @return array
     * @throws \ReflectionException
     */
    static function getConstants()
    {
        $oClass = new ReflectionClass(static::class);
        return $oClass->getConstants();
    }
}
