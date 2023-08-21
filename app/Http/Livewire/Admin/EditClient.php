<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;

class EditClient extends Component
{
    public $name, $address, $phone, $code, $client_id;

    public function render()
    {
        $client = Client::findOrFail($this->client_id);

        return view('livewire.admin.edit-client', ['client' => $client])->extends('base');
    }

    function mount($client_id)
    {
        $client = Client::where('id', $this->client_id)->first();

        $this->name = $client->name;
        $this->address = $client->address;
        $this->phone = $client->phone;
        $this->code = $client->code;
    }

    function update()
    {
        $this->validate(['name' => 'required', 'address' => 'required', 'code' => 'required|min:4', 'phone' => 'required']);

        $client = Client::find($this->client_id);
        $client->code = $this->code;
        $client->name = $this->name;
        $client->address = $this->address;
        $client->phone = $this->phone;
        $client->save();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess("Client updated successfully!");

        redirect()->to(route('clients'));
    }
}
