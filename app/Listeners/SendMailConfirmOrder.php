<?php

namespace App\Listeners;

use App\Events\CustomerOrder;
use App\Mail\ShipmentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailConfirmOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(CustomerOrder $event)
    {
        $order = $event->order;
        $email = $order->email;
        Mail::to($email)->send(new ShipmentNotification($order));
    }
}
