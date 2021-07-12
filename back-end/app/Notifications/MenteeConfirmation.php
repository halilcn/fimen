<?php

namespace App\Notifications;

use App\Models\MentorMenteeProgram;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
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
    public
    function __construct(
        public MentorMenteeProgram $mentorMenteeProgram
    ) {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public
    function via(
        $notifiable
    ) {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public
    function toArray(
        $notifiable
    ) {
        return [
            'mentor_name' => $this->mentorMenteeProgram->mentor->user->name,
            'mentor_username' => $this->mentorMenteeProgram->mentor->user->username,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage(
            [
                'deneme' => 'dsadad adsad sa',
                'deneme2' => 'deneme de ned',
            ]
        );
    }

    public function broadcastOn()
    {
        return new Channel('user_notifications.29'); //private
    }
}
