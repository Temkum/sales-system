<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class OrderList extends Component
{
    public $client_id;

    use WithPagination;

    public function render()
    {
        $orders_query = Order::query();

        if ($this->client_id) {
            $orders_query->where('client_id', $this->client_id);
        }

        $orders = $orders_query->with('client')->orderBy('created_at', 'DESC')->paginate(15);
        $clients = Client::all();

        return view('livewire.admin.order-list', [
            'orders' => $orders,
            'clients' => $clients
        ])->extends('base');
    }
}
