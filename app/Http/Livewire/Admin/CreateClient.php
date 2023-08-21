<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;

class CreateClient extends Component
{
    public $name, $address, $phone, $code;

    public function render()
    {
        return view('livewire.admin.create-client')->extends('base');
    }

    public function addClient()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'code' => 'required|unique:clients',
        ]);

        Client::create([
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'code' => $this->code,
        ]);

        $this->reset(['name', 'address', 'phone', 'code']);
    }
}
