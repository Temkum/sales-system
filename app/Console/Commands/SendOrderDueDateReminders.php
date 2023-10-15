<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Notifications\OrderDueDateReminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class SendOrderDueDateReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sendOrderDueDateReminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Order Due Date Reminders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $notifiable = auth()->user(); // Assuming you want to send the notification to the authenticated user
        // $order = Order::find(1); // Assuming you have an Order model and want to send the notification for a specific order

        $orders = Order::where('due_date', now()->addDays(3))
            ->where('status', '!=', 'completed')
            ->get();

        foreach ($orders as $order) {
            $order->user->notify(new OrderDueDateReminder($order));
        }

        return Command::SUCCESS;
    }
}
