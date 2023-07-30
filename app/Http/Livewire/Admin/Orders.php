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
    public $sale_code, $price, $advance, $quantity, $description, $due_date, $name, $balance;
    public $current_page = 1;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete' => 'deleteSale',
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function render()
    {
        $this->page_number = 10;
        $this->page = $this->current_page;

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

        // $this->resetPage();

        return view('livewire.admin.orders', ['orders' => $orders])->extends('base');
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatingPage()
    {
        $this->current_page = $this->page;
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
            ->position('x', 'center')
            ->position('y', 'bottom')
            ->duration(2000)->addSuccess('Status updated successfully!');
    }

    public function confirmDelete(int $id)
    {
        $this->dispatchBrowserEvent('swal-confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' =>  $id
        ]);
    }

    public function deleteSale($id)
    {
        $sale = Order::find($id);

        if ($sale) {
            $sale->delete();
            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->duration(2000)
                ->addSuccess('Record deleted successfully');
        } else {
            notyf()->position('x', 'right')->position('y', 'top')->addError('Record not found');
        }
    }

    public function deletedRecords()
    {
        $deleted_records = Order::onlyTrashed()->paginate(20);

        return view('livewire.admin.deleted-records', ['deleted_records' => $deleted_records])->extends('base');
    }
}
