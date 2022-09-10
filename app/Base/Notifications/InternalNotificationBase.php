<?php

namespace App\Base\Notifications;

use App\Entities\Activities\Models\Activity;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Entities\Incidents\Models\Incident;
use NotificationChannels\Fcm\FcmChannel;

/**
 * Базовый класс для внутренних оповещений
 *
 * Class InternalNotificationBase
 * @package App\Base\Notifications
 */
abstract class InternalNotificationBase extends Notification
{
    use Queueable;

    /**
     * @var array
     */
    protected $role_page_map = [];

    /**
     * @var string[]
     */
    protected $via_map = ['EMAIL' => 'mail'];

    /**
     * @var Incident|null
     */
    protected $incident;
    /**
     * @var mixed|null
     */
    protected $user;
    /**
     * @var Activity|null
     */
    protected $activity;

    /**
     * @param  Incident|null  $incident
     * @param  null  $user
     * @param  Activity|null  $activity
     */
    public function __construct(Incident $incident = null, $user = null, Activity $activity = null)
    {
        $this->incident = $incident;
        $this->user = $user;
        $this->activity = $activity;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        $notification_types = collect($notifiable->notification_types)
            ->map(function ($type) {
                $map = $this->via_map;
                return $map[$type];
            })
            ->push('broadcast')
            ->push(FcmChannel::class)
            ->toArray();

        return $notification_types;
    }
}
