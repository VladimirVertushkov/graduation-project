<?php


namespace App\Base\Models;

use App\Entities\Reverts\Traits\Revertable;
use App\Entities\Users\Vocabularies\RolesVocabulary;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Базовая модель сущностей, содержит общий код,
 * поддерживает глобальный идентификатор uuid
 * поддерживает присоединение документов к модели (HasMediaTrait)
 * Доступна диспетчеризация событий при реализации связи BeelongToMany (pivot table) при вызове sinc(), attach(), detach() и updateExistingPivot()
 * События можно наблюдать с помощью callback функций при их регистрации в pivotAttaching, pivotDetaching,
 * а так же эти события сохраняются в Redis
 *
 * Class BaseModel
 * @package App\Base\Models
 */
abstract class BaseModel extends Model implements HasMedia
{
    use Revertable;
    use Uuid;
    use InteractsWithMedia;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'closed_at',
        'set_external_at',
        'written_off_at',
        'sent_to_engineer_at',
        'next_run_at'
    ];

    /**
     * Возвращает время создания сущности в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getCreatedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время обновления сущности в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getUpdatedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время удаления сущности в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getDeletedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время перехода сущности в неактивный режим в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getClosedAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время передачи сущности во внешнее обслуживаеие в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getSetExternalAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время списания сущности в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getWrittenOffAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время передачи инженеру в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getSentToEngineerAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    /**
     * Возвращает время следующего запуска на исполнение сущности в часовом поясе
     * текущей организации.
     *
     * @param  mixed  $value
     */
    public function getNextRunAtAttribute($value)
    {
        if (!$value) {
            return null;
        }
        $timezone = auth()->user() &&
        auth()->user()->role_name !== RolesVocabulary::SUPERADMIN &&
        auth()->user()->role_name !== RolesVocabulary::SUPPORT
            ? auth()->user()->organisation->timezone
            : '+00:00';
        $date = $this->asDateTime($value);

        return $date->timezone($timezone)->toDateTimeString();
    }

    public function shouldDeletePreservingMedia(): bool
    {
        return true;
    }

    public function getAppends():array
    {
        return $this->appends;
    }
}
