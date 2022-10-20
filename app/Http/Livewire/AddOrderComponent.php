<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddOrderComponent extends Component
{
    public function render()
    {
        return view('livewire.add-order-component')->extends('base');
    }
}