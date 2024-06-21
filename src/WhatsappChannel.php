<?php

namespace Teodoriu\Whatsapp;

use Teodoriu\Whatsapp\Facade\Whatsapp;
use Teodoriu\Whatsapp\Exceptions\InvalidMessageException;
use Teodoriu\Whatsapp\Messages\WhatsappMessage;
use Illuminate\Notifications\Notification;

class WhatsappChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $phones = $notifiable->routeNotificationFor('whatsapp', $notification);

        if (empty($phones)) {
            return [];
        }

        $message = $notification->toWhatsapp($notifiable);

        if (!$message instanceof WhatsappMessage) {
            throw new InvalidMessageException($message);
        }

        return Whatsapp::send($phones, $message);
    }
}
