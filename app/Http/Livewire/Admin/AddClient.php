<?php

namespace App\Http\Livewire\Admin;

use App\Models\Client;
use Livewire\Component;

class AddClient extends Component
{
    public $name, $address, $phone, $code;
    public $client_id;

    public function mount($client = null)
    {
        if ($client) {
            $this->name = $client->name;
            $this->address = $client->address;
            $this->phone = $client->phone;
            $this->code = $client->code;
            $this->client_id = $client->id;
        }
    }

    public function render()
    {
        return view('livewire.admin.add-client')->extends('base');
    }



    public function addClient()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'code' => 'required|unique:clients|min:4',
        ]);


        if ($this->client_id) {
            $client = Client::find($this->client_id);

            $client->update([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'code' => $this->code
            ]);
            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->addSuccess("Client updated successfully!");
        } else {
            Client::create([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'code' => $this->code,
            ]);
            notyf()
                ->position('x', 'center')
                ->position('y', 'top')
                ->addSuccess("Client added successfully!");

            $this->reset(['name', 'address', 'phone', 'code']);
        }

        redirect()->to(route('clients'));
    }
}
