<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Measurement;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class ClientDetails extends Component
{
    public $name, $address, $phone, $code, $client_id;
    public $selected_measurement = null;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $client = Client::findOrFail($this->client_id);

        $orders_query = Order::query();

        if ($this->client_id) {
            $orders_query->where('client_id', $this->client_id);
        }

        $orders = $orders_query->with('client')->orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.admin.client-details', ['client' => $client, 'orders' => $orders])->extends('base');
    }

    function mount($client_id)
    {
        $client = Client::with('measurements')->find($client_id);

        $this->name = $client->name;
        $this->address = $client->address;
        $this->phone = $client->phone;
        $this->code = $client->code;
    }

    public function selectMeasurement($measurement_id)
    {
        $this->selected_measurement = Measurement::find($measurement_id);
    }
}
