<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\{MailMessage, BroadcastMessage};
use Illuminate\Notifications\Notification;
use Carbon\Carbon;
use App\Model\Comment;

class RepliedToThread extends Notification
{
    use Queueable;

    public $thread, $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($thread)
    {
        $this->thread = $thread;
        $this->comment = Comment::where('user_id', $thread)->first();
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
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'thread' => $this->thread,
            'comment' => $this->comment,
            'user' => auth()->user(),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'thread' => $this->thread,
            'comment' => $this->comment,
            'user' => auth()->user(),
        ]);
    }
}
