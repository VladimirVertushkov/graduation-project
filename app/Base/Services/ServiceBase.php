<?php

namespace App\Base\Services;

use App\Entities\Users\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * Class ServiceBase
 * @package App\Base\Services
 *
 * Базовый класс для сервисов приложения, содержит пользователя
 */
abstract class ServiceBase
{
    /**
     * @var
     */
    protected $user_organisation_id;

    /**
     * @var
     */
    protected $user;

    /**
     * ServiceBase constructor.
     */
    public function __construct()
    {
//        $user = auth()->user() ?? auth()->guard('api')->user();
//        if ($user) {
//            $this->setUser($user);
//        }
    }

    /**
     * Установка внутреннего пользователя сервиса. Нужно для использования в случаях, когда у нас есть информация о
     * пользователе, но нет авторизации (например, в фоновых задачах)
     *
     * @param  User  $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
        $this->user_organisation_id = $user->organisation_id ?? null;
    }

    /**
     * Возвращает идентификатор организации под которой работает пользователь
     *
     * @return mixed
     */
    public function getUserOrganisationId()
    {
        return $this->user_organisation_id;
    }

    protected function beforeSaveHook($data, $entity, &$extraData)
    {
    }

    protected function afterSaveHook($data, $entity, &$extraData)
    {
    }
}
