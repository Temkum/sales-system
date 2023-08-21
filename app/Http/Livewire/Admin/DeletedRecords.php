<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Order;
use Livewire\Component;

class DeletedRecords extends Component
{
    public function render()
    {
        $deleted_records = Order::onlyTrashed()->paginate(20);
        $deleted_clients = Client::onlyTrashed()->paginate(20);

        return view('livewire.admin.deleted-records', ['deleted_records' => $deleted_records, 'delete_clients' => $deleted_clients])->extends('base');
    }

    function restore($id)
    {
        $record = Order::onlyTrashed()->where('id', $id)->first();

        if ($record) {
            $record->restore();
            notyf()->position('x', 'right')->position('y', 'top')->addInfo('Record restored successfully!');
        }

        $this->render();
    }

    function hardDelete($id)
    {
        $record = Order::onlyTrashed()->where('id', $id)->first();

        if ($record) {
            $record->forceDelete();
            notyf()->position('x', 'right')->position('y', 'top')->addInfo('Record removed successfully!');
        }
    }
}
