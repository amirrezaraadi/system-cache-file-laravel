<?php

namespace App\Notifications\Auth;

use App\Mail\Auth\RegisterEmail;
use App\Service\ServiceUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Cache;

class RegisterNotification extends Notification
{
    use Queueable;

    public function __construct()
    {
        //
    }


    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    public function toMail($notifiable): RegisterEmail
    {
        $code = ServiceUser::generate();
        ServiceUser::store($notifiable->id, $code, 120);
        return (new RegisterEmail($code))->to($notifiable->email, $notifiable->name);
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
