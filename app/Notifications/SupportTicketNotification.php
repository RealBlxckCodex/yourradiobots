<?php

namespace App\Notifications;

use App\Support;
use App\SupportCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

class SupportTicketNotification extends Notification
{
    use Queueable;

    private $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Support $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    public function toTelegram($notifiable)
    {
        $supportCategoryName = SupportCategory::all()->where('id', $this->ticket->support_category_id)->first()->name;
        $ticketId = $this->ticket->id;
        $ticketTitle = $this->ticket->title;
        return TelegramMessage::create()
            ->to(env('TELEGRAM_CHAT_ID'))
            ->options(['parse_mode' => 'markdown'])
            ->content("Es wurde ein neues Ticket erstellt mit der ID *#$ticketId*"
                . "\n*Title*: $ticketTitle"
                . "\n*Kategorie*: $supportCategoryName")
            ->button('Ticket bearbeiten', route('welcome'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
