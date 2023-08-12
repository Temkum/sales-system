<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Client;
use Livewire\Component;

class ShowOrders extends Component
{
    public $client;

    public function mount(Client $client)
    {
        $this->client = $client;
    }

    public function render()
    {
        return view('livewire.admin.show-orders', [
            'orders' => Order::where('id', $this->client->id)->get(),
        ])->extends('base');
    }
}
