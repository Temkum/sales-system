<?php

namespace App\Console;

use App\Models\Order;
use App\Notifications\OrderDueDateReminder;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    /*   protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();

        // $schedule->command('command:sendOrderDueDateReminders')->everyMinute();

        $schedule->call(function () {
            $orders = Order::where('due_date', now()->addDays(3))
                ->where('status', '!=', 'completed')
                ->get();

            foreach ($orders as $order) {
                $order->notify(new OrderDueDateReminder($order));
            }
        })->everyMinute();
    } */

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $orders = Order::whereDate('due_date', now()->addDays(3))->get();

            foreach ($orders as $order) {
                if ($order->status !== 'completed') {
                    $order->sendDueDateNotification();
                }
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
