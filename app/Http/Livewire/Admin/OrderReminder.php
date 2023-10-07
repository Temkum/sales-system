<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Livewire\Component;

class OrderReminder extends Component
{
    protected $listeners = ['order.due' => 'showReminder'];

    public function render()
    {
        return view('livewire.admin.order-reminder');
    }

    function showReminder($order)
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __("Order #{$order->id} is due tomorrow!")]);
    }
}
