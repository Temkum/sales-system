<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class EditOrder extends Component
{
    public $msg = '';
    public $updateMode = true;
    public $sale_code, $order_id, $price, $advance, $quantity, $description, $due_date, $name, $balance, $address, $phone;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
        $order = Order::where('id', $order_id)->first();

        if ($this->sale_code === null) {
            $this->sale_code = strtoupper(Str::random(1)) . rand(4, 9999);
        }
        $this->name = $order->name;
        $this->phone = $order->phone;
        $this->address = $order->address;
        $this->price = $order->price;
        $this->advance = $order->advance;
        $this->balance = $order->balance;
        $this->quantity = $order->quantity;
        $this->due_date = $order->due_date;
        $this->description = $order->description;
    }

    public function render()
    {
        $order = Order::findOrFail($this->order_id);

        return view('livewire.admin.edit-order', ['order' => $order])->extends('base');
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

        return $this->msg = 'Status updated successfully!';
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'advance' => 'required|numeric',
            'due_date' => 'required',
            'description' => 'required',
        ]);

        $sale_record = Order::find($this->order_id);
        $sale_record->price = $this->price;
        $sale_record->address = $this->address;
        $sale_record->phone = $this->phone;
        $sale_record->balance = $this->price - $this->advance;
        $sale_record->quantity = $this->quantity;
        $sale_record->advance = $this->advance;
        $sale_record->description = $this->description;
        $sale_record->due_date = $this->due_date;
        // dd($sale_record);
        $sale_record->save();

        session()->flash('success', 'Record update successful!');
        redirect()->to('admin/orders');
    }
}