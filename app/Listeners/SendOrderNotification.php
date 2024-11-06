<?php

namespace App\Listeners;

use App\Events\OrderProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderNotification;

class SendOrderNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(OrderProcessed $event)
    {
        // Kirim notifikasi ke kusir terkait
        // Misalnya, menggunakan Laravel Notification
        Notification::send($event->order->kusir, new OrderNotification($event->order));
    }
}
