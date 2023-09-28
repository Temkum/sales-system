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
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $orders_query = Order::query();

        if ($this->client_id) {
            $orders_query->where('client_id', $this->client_id);
        }

        $orders = $orders_query->with('client')->orderBy('created_at', 'DESC')->paginate(15);
        $clients_with_orders = Client::has('orders')->get();
        $clients = Client::all();

        return view('livewire.admin.order-list', [
            'orders' => $orders,
            'clientsWithOrders' => $clients_with_orders,
            'clients' => $clients
        ])->extends('base');
    }
}
