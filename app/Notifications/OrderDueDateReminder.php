<?php

namespace App\Notifications;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderDueDateReminder extends Notification
{
    use Queueable;

    public $user;
    private $order;
    private $client;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, Client $client)
    {
        $this->order = $order;
        $this->client = $client;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'order_id' => $this->order->id,
            'due_date' => $this->order->due_date,
            'client_name' => $this->client->name,
            'message' => __('The due date for this order is approaching.'),
            'action_url' => route('order-details', $this->order->id)
        ];
    }
}
