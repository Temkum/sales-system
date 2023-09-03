<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use App\Models\Measurement;
use Livewire\Component;

class ClientDetails extends Component
{
    public $name, $address, $phone, $code, $client_id;
    public $selected_measurement = null;

    public function render()
    {
        $client = Client::findOrFail($this->client_id);

        return view('livewire.admin.client-details', ['client' => $client])->extends('base');
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
