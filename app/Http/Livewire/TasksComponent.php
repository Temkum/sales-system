<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TasksComponent extends Component
{
    public function render()
    {
        return view('livewire.tasks-component')->extends('base');
    }
}
