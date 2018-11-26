<?php

namespace App\Listeners;

use App\Events\UserCreated;
use App\Mail\NewUser;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendNewUserEmail implements ShouldQueue
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
    public function handle(UserCreated $event)
    {
        $sendTo = $event->getUser()->getAttribute('email');

        Mail::to($sendTo)->send(new NewUser($event->getUser()));
    }
}
