<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class Orders extends Component
{
    public function render()
    {
        $page_number = 13;

        $orders = Order::paginate($page_number);

        return view('livewire.orders', ['orders' => $orders])->extends('base');
    }
}