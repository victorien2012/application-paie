<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmailToAdminAfterRegistrationNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $code;
    public $email;
    public function __construct($code,$email)
    {
      $this->code=$code;
      $this->email=$email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */

    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Votre code de confirmation')
                    ->greeting('Bonjour')
                    ->line('votre compte à été crée avec succès sur la platforme de gestion des employers et des salaries. Votre code de confirmation est : .')
                    ->line('Saisissez le code'.$this->code.' dans la page de connexion pour valider votre compte.')
                    ->action('Cliquez ici', url('/validation/'.$this->code.'/'.$this->email.''))
                    ->line('Merci d\'avoir choisi notre plateforme!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
