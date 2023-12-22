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
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'code' => 'required|unique:clients,code,' . $this->client_id . '|min:4|max:8|regex:/^(?=.*[a-zA-Z])(?=.*\d).{1,}$/',
        ], [
            'code.regex' => __('The code must contain both alphabetic and numeric characters.'),
        ]);

        $client = Client::find($this->client_id);
        $client->code = strtoupper($this->code);
        $client->name = $this->name;
        $client->address = $this->address;
        $client->phone = $this->phone;
        $client->save();

        notyf()->addSuccess(__("Client updated successfully!"));

        redirect()->to(route('clients'));
    }
}
