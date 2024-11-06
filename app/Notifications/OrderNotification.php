<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'message' => 'Anda memiliki order baru dengan ID ' . $this->order->id,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            // Additional data for broadcasting, if needed
            'order_id' => $this->order->id,
        ];
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }
}
