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
    public $page_number;

    public $msg = '';

    use WithPagination;

    public function mount()
    {
        $this->sort_by = 'default';
        $this->page_number = 13;
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

    public function render()
    {
        $page_number = 13;

        /*    if ($this->sorting == 'processing') {
            $orders = Order::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('due', 'DESC')->paginate($page_number);
        } elseif ($this->sorting == 'due') {
            $orders = Order::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'ASC')->paginate($page_number);
        } elseif ($this->sorting == 'completed') {
            $orders = Order::where('name', 'LIKE', '%' . $this->search . '%')->orderBy('created_at', 'DESC')->paginate($page_number);
        } else {
            $sort_orders = Order::where('name', 'LIKE', '%' . $this->sort_by . '%')->paginate($this->page_number);
        }
        */
        
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

        return view('livewire.admin.orders', ['orders' => $orders])->extends('base');
    }
}