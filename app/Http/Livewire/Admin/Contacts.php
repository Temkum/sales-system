<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{
    public $name, $phone, $address, $city, $contact_id;
    public $updateMode = false;
    public $i = 1;
    public $inputs = [];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function resetInputFields()
    {
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->city = '';
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);
    }

    public function addContact()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'name.*' => 'required',
            'phone.*' => 'required',
            'address.*' => 'required',
            'city.*' => 'required',
        ]);

        foreach ($this->name as $key => $value) {
            Contact::create(
                [
                    'name' => $this->name[$key],
                    'phone' => $this->phone[$key],
                    'address' => $this->address[$key],
                    'city' => $this->city[$key],
                ]
            );
        }

        $this->inputs = [];
        $this->resetInputFields();

        session()->flash('success', 'Contact added with success!');
    }

    public function render()
    {

        return view('livewire.admin.contacts')->extends('base');
    }
}
