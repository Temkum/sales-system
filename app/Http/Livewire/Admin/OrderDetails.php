<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class OrderDetails extends Component
{
    public $order_id, $price, $advance, $quantity, $description, $due_date;

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
        // dd($items);

        return view('livewire.admin.order-details', ['order' => $order, 'items' => $items])->extends('base');
    }
}
