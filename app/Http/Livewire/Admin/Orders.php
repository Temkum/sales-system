<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;

class Orders extends Component
{
    public $sorting;
    public $search;
    public $start_date = '';
    public $end_date = '';
    // use WithPagination;

    public function mount()
    {
        $this->sorting = 'default';
    }

    /* public function updatedSearch()
    {
        $this->resetPage();
    }
 */
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
            $orders = Order::where('name', 'LIKE', '%' . $this->search . '%')->paginate($page_number);
        } */

        $orders = Order::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('price', 'LIKE', '%' . $this->search . '%')
            ->orWhere('advance', 'LIKE', '%' . $this->search . '%')
            ->orWhere('balance', 'LIKE', '%' . $this->search . '%')
            ->orWhere('status', 'LIKE', '%' . $this->search . '%')
            ->orWhere('address', 'LIKE', '%' . $this->search . '%')->paginate($page_number);

        if ($this->start_date && $this->end_date) {
            $orders = Order::where('created_at', '>=', $this->start_date)
                ->where('created_at', '<=', $this->end_date)->paginate(10);
        } else {
            $orders = Order::latest()->paginate(13);
        }

        return view('livewire.admin.orders', ['orders' => $orders])->extends('base');
    }
}