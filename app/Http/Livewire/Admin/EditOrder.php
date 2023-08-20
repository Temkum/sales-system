<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EditOrder extends Component
{
    public $msg = '';
    public $updateMode = true;
    public $order_id, $price, $advance, $quantity, $description, $due_date, $balance;
    public $client_id;
    public $clients;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
        $order = Order::where('id', $order_id)->first();

        $this->clients = Client::all();

        $this->client_id = $order->client_id;
        $this->price = $order->price;
        $this->advance = $order->advance;
        $this->balance = $order->balance;
        $this->quantity = $order->quantity;
        $this->due_date = $order->due_date;
        $this->description = $order->description;
    }

    public function render(Client $client)
    {
        $order = Order::find($this->order_id);

        return view('livewire.admin.edit-order', ['order' => $order, 'client' => $client])->extends('base');
    }

    public function updateSaleStatus($sale_id, $status)
    {
        $sale = Order::find($sale_id);
        $sale->status = $status;

        if ($status == 'completed') {
            $sale->date_delivered = DB::raw('CURRENT_DATE');
        } elseif ($status == 'cancelled') {
            $sale->date_cancelled = DB::raw('CURRENT_DATE');
        }
        $sale->save();

        return notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->addSuccess('Status updated successfully!');
    }

    public function update()
    {
        $this->validate([
            'client_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'advance' => 'required|numeric',
            'due_date' => 'required',
            'description' => 'required',
        ]);

        $sale_record = Order::find($this->order_id);
        $sale_record->client_id = $this->client_id;
        $sale_record->price = $this->price;
        $sale_record->balance = $this->price - $this->advance;
        $sale_record->quantity = $this->quantity;
        $sale_record->advance = $this->advance;
        $sale_record->description = $this->description;
        $sale_record->due_date = $this->due_date;
        $sale_record->save();

        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->addSuccess('Record update successful');
        redirect()->to(route('client-orders'));
    }
}
