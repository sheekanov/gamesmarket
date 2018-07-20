<?php

namespace App\Listeners;

use App\Events\OrderPostedEvent;
use App\Setting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\newOrder;

class OrderPostedListener implements ShouldQueue
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
     * @param  OrderPostedEvent  $event
     * @return void
     */
    public function handle(OrderPostedEvent $event)
    {
        sleep(5);
        $data=['order' => $event->order];
        $mail = new newOrder($data);
        $mail->subject('Новый заказ');
        Mail::to(Setting::find(1)->value)->send($mail);
    }
}
