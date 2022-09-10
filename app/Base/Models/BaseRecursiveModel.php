<?php

namespace App\Base\Models;

use App\Entities\Reverts\Traits\Revertable;
use App\Entities\Users\Vocabularies\RolesVocabulary;
use App\Traits\Recursive;
use Baum\Node;

/**
 *Базовая модель для рекурсивных  сущностей (организации, категории)
 *
 * Class BaseRecursiveModel
 * @package App\Base\Models
 */
abstract class BaseRecursiveModel extends Node
{
    use Revertable;
    use Recursive;

    /**
     * @var string
     */
    protected $parentColumnName = 'parent_id';
    /**
     * @var string
     */
    protected $leftColumnName = 'lft';
    /**
     * @var string
     */
    protected $rightColumnName = 'rgt';
    /**
     * @var string
     */
    protected $depthColumnName = 'depth';

    /**
     * @var string[]
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @param $value
     * @return string|null
     */
    public function getCreatedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() && !in_array(auth()->user()->role_name, RolesVocabulary::ROLES_WITHOUT_TIMEZONE)
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * @param $value
     * @return string|null
     */
    public function getUpdatedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() && !in_array(auth()->user()->role_name, RolesVocabulary::ROLES_WITHOUT_TIMEZONE)
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * @param $value
     * @return string|null
     */
    public function getDeletedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() && !in_array(auth()->user()->role_name, RolesVocabulary::ROLES_WITHOUT_TIMEZONE)
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }
}
