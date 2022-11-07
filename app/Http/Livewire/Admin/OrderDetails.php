<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class OrderDetails extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;

        $order = Order::find($this->order_id);
        $items = json_decode($order->items);
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        $items = json_decode($order->items);

        return view('livewire.admin.order-details', ['order' => $order, 'items' => $items])->extends('base');
    }
}
