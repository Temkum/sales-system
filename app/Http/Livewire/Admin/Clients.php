<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class Clients extends Component
{
    public $name, $address, $phone, $code;
    public Int $page_number;
    public $msg = '';
    public $current_page = 1;
    public $search;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'delete' => 'deleteClient',
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function render()
    {
        $clients = Client::all();
        $this->page_number = 15;
        $this->page = $this->current_page;

        $clients = Client::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('address', 'LIKE', '%' . $this->search . '%')
            ->orWhere('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
            ->orderBy('created_at', 'DESC')->paginate($this->page_number);

        return view('livewire.admin.clients', ['clients' => $clients])->extends('base');
    }

    public function confirmDelete(int $id)
    {
        $client = Client::find($id);

        $this->dispatchBrowserEvent('swal-confirm', [
            'type' => 'warning',
            'title' => __("Sure you want to remove $client->name?"),
            'text' => __('This can not be undone!'),
            'id' =>  $id
        ]);
    }

    public function deleteClient($id)
    {
        $client = Client::find($id);

        if ($client) {
            $client->delete();
            notyf()->addSuccess(__('Client deleted successfully'));
        } else {
            notyf()->position('x', 'right')->position('y', 'top')->addError(__('Record not found'));
        }
    }

    public function deletedRecords()
    {
        $deleted_records = Client::onlyTrashed()->paginate(20);

        return view('livewire.admin.deleted-records', ['deleted_records' => $deleted_records])->extends('base');
    }
}
