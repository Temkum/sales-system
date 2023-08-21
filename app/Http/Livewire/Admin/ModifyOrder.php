<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class ModifyOrder extends Component
{
    public $orderId;
    public $order;
    public $modalOpen = false;

    protected $rules = [
        'order.price' => 'required|numeric',
        'order.advance' => 'required|numeric',
        'order.due_date' => 'required|date',
        'order.status' => 'required|string',
        // Add any additional validation rules for other order fields
    ];

    public function mount($orderId)
    {
        $this->orderId = $orderId;
        $this->loadOrder();
    }

    public function render()
    {
        return view('livewire.admin.modify-order');
    }

    public function loadOrder()
    {
        $this->order = Order::find($this->orderId);
    }

    public function openModal()
    {
        $this->modalOpen = true;
    }

    public function closeModal()
    {
        $this->modalOpen = false;
    }

    public function updateOrder()
    {
        $this->validate();

        // Update the order in the database
        $this->order->save();

        // Close the modal
        $this->closeModal();

        // You can perform additional actions, such as displaying a success message or redirecting the user
    }
}
