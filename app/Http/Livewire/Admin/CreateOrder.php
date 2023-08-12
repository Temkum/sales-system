<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class CreateOrder extends Component
{
    public $client_id, $items, $price, $quantity, $advance_paid, $balance, $description;

    public function render()
    {
        return view('livewire.admin.create-order')->extends('base');
    }

    public function store()
    {
        $this->validate([
            'client_id' => 'required',
            'items' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'advance_paid' => 'required',
            'balance' => 'required',
        ]);

        $order = Order::create([
            'client_id' => $this->client_id,
            'items' => $this->items,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'advance_paid' => $this->advance_paid,
            'balance' => $this->balance,
            'description' => $this->description,
        ]);

        $this->reset(['client_id', 'items', 'price', 'quantity', 'advance_paid', 'balance', 'description']);
    }
}
