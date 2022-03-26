<?php

namespace App\Listeners;
use App\Events\SendMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Mail;

class SendMailFired
{
    public function __construct()
    {
        
    }
    public function handle(SendMail $event)
    {
        // dd($event);
        $user = User::find($event->userId)->toArray();
        Mail::send('emails.mailEvent', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Student Orders Fixed');
        });
    }
}