<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Livewire\Component;

class OrderReminder extends Component
{
    protected $listeners = ['order.due' => 'showReminder'];

    public function render()
    {
        flash(__("Order reminder has been enabled!"));

        return view('livewire.admin.order-reminder')->extends('base');
    }

    function showReminder($order)
    {
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => __("Order #{$order->id} is due tomorrow!")]);
    }
}
