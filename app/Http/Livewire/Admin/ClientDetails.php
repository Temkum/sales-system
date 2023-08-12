<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;

class ClientDetails extends Component
{
    public $name, $address, $phone, $code, $client_id;

    public function render()
    {
        $client = Client::findOrFail($this->client_id);

        return view('livewire.admin.client-details', ['client' => $client])->extends('base');
    }

    function mount($client_id)
    {
        $client = Client::findOrFail($client_id);

        $this->name = $client->name;
        $this->address = $client->address;
        $this->phone = $client->phone;
        $this->code = $client->code;
    }
}
