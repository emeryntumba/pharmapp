<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StockAlertNotification extends Notification
{
    use Queueable;

    protected $produit;

    /**
     * Create a new notification instance.
     */
    public function __construct($produit)
    {
        $this->produit = $produit;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'Stock bientôt épuisé. Veuillez réapprovisionner.',
            'produit_id' => $this->produit->id,
        ];
    }

    public function toDatabase(object $notifiable){
        return [
            'message' => 'Stock bientôt épuisé. Veuillez réapprovisionner.',
            'produit_id' => $this->produit->id, // Ajoutez d'autres informations pertinentes ici
        ];
    }

}
