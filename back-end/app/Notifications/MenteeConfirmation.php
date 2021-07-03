<?php

namespace App\Notifications;

use App\Models\MentorMenteeProgram;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MenteeConfirmation extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public MentorMenteeProgram $mentorMenteeProgram)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
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
            'mentor_name' => $this->mentorMenteeProgram->mentor->user->name,
            'mentor_username' => $this->mentorMenteeProgram->mentor->user->username,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'deneme' => 'asdadada daskksad ka'
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user_notifications.29');
    }
}
