<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Orders extends Component
{
    public $sort_by;
    public $search;
    public $start_date = '';
    public $end_date = '';
    public Int $page_number;
    public $msg = '';
    public $updateMode = false;
    public $sale_code, $edit_orderId, $price, $advance, $quantity, $description, $due_date, $name, $balance;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $this->page_number = 10;

        $orders = Order::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('price', 'LIKE', '%' . $this->search . '%')
            ->orWhere('sale_code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('advance', 'LIKE', '%' . $this->search . '%')
            ->orWhere('balance', 'LIKE', '%' . $this->search . '%')
            ->orWhere('status', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orWhere('address', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($this->page_number);

        if (($this->start_date && $this->end_date) && $this->start_date) {
            $orders = Order::where('created_at', '>=', $this->start_date)
                ->where('created_at', '<=', $this->end_date)->paginate(10);
        }

        $this->resetPage();

        return view('livewire.admin.orders', ['orders' => $orders])->extends('base');
    }

    public function edit(int $id)
    {
        $this->updateMode = true;

        $order = Order::findOrFail($id);

        $this->edit_orderId = $order->id;
        $this->name = $order->name;
        $this->price = $order->price;
        $this->advance = $order->advance;
        $this->balance = $order->balance;
        $this->quantity = $order->quantity;
        $this->due_date = $order->due_date;
        $this->description = $order->description;

        $this->dispatchBrowserEvent('edit-order');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'advance' => 'required|numeric',
            'due_date' => 'required',
            'description' => 'required',
        ]);

        $id  = $this->order_id;

        $order = Order::find($id);

        $order->name = $this->name;
        $order->price = $this->price;
        $order->quantity = $this->quantity;
        $order->advance = $this->advance;
        $order->description = $this->description;
        $order->due_date = $this->due_date;
        $order->save();

        session()->flash('success', 'Record update successful!');
        $this->resetInputFields();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function closeModal()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->quantity = '';
        $this->advance = '';
        $this->description = '';
        $this->due_date = '';
    }

    public function updatedSearch()
    {
        $this->resetPage();
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

    public function deleteSale($id)
    {
        $sale = Order::find($id);
        $sale->delete();

        $this->msg = 'Deleted successfully!';
    }
}