<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Discussion;
class NewReplyAdded extends Notification implements ShouldQueue
{
    use Queueable;

    
   public $dsicussion;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Discussion $discussion)
    {
        $this->dsicussion = $discussion; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
                    ->line('A New Reply Has Added To Discussion.')
                    ->action('New Discussion', route('disc.show',$this->dsicussion->slug))
                    ->line('Thank you for using our application!');
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
            'discussion' => $this->dsicussion,
        ];
    }
}
