<?php

namespace App\Http\Livewire\Admin;

use App\Models\CartItems;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;

class NewAddOrder extends Component
{
    public $name, $phone, $address, $due_date, $status, $description, $prod_qty, $sale_code;
    public $balance, $advance, $price, $quantity = 0;
    public $product_code;
    public $items = [];
    public $msg = '';
    public $items_in_cart;

    public $item_name;
    public $item_qty, $item_price;
    public $i = 1;
    public $itemId;

    public function mount()
    {
        $this->items_in_cart = CartItems::all();
    }

    public function render()
    {
        if ($this->advance != '') {
            $total_amt = $this->items_in_cart->sum('item_price');
            $this->balance = $total_amt;
        }

        return view('livewire.admin.new-order')->extends('base');
    }

    public function addItem()
    {
        $i = $this->i + 1;
        $this->i = $i;
        array_push($this->items, $i);
    }

    public function resetInputFields()
    {
        $this->item_name = '';
        $this->item_price = '';
        $this->item_qty = '';
    }

    public function removeItem($i)
    {
        unset($this->items[$i]);
    }

    public function removeFromCart($id)
    {
        $cart_item = CartItems::find($id);
        $cart_item->delete();

        notyf()
            ->position('x', 'center')
            ->position('y', 'top')
            ->addSuccess('Item removed successfully');

        $this->items_in_cart = $this->items_in_cart->except($id);
    }

    public function increaseQty($prod_id)
    {
        $cart_product = CartItems::find($prod_id);
        $cart_product->increment('product_qty', 1);

        $update_price = $cart_product->product_qty * $cart_product->product->price;

        $cart_product->update(['product_price' => $update_price]);
        $this->mount();
    }

    public function decreaseQty($prod_id)
    {
        $cart_product = CartItems::find($prod_id);

        if ($cart_product->product_qty <= 1) {
            return flash('warning', "$cart_product->product->prod_name quantity can't be less than 1. Increase the quantity or remove items from cart!");
        }

        $cart_product->decrement('product_qty', 1);
        $update_price = $cart_product->product_qty * $cart_product->product->price;

        $cart_product->update(['product_price' => $update_price]);
        $this->mount();
    }

    public function addOrUpdateItem()
    {
        $this->validate([
            'item_name' => 'required',
            'item_price' => 'required',
            'item_qty' => 'required',
            'item_name.*' => 'required',
            'item_price.*' => 'required',
            'item_qty.*' => 'required',
        ]);

        $cart_item = CartItems::where('item_name', $this->item_name)->first();

        // check if cart has any items
        $item_count = CartItems::where('item_name', $this->item_name)
            ->where('item_price', $this->item_price)
            ->where('item_qty', $this->item_qty)->count();

        if ($item_count > 0) {
            return session()->flash('info', "$cart_item->item_name is already added. Please increase the quantity or price!");
        } else if ($this->itemId) {
            $item = CartItems::find($this->itemId);
            foreach ($this->item_name as $key => $value) {
                CartItems::createOrUpdate(
                    [
                        'item_name' => $this->item_name[$key],
                        'item_qty' => $this->item_qty[$key],
                        'item_price' => $this->item_price[$key],
                    ]
                );
            }
            flash('success', 'Item updated successfully');
        } else {
            foreach ($this->item_name as $key => $value) {
                CartItems::create(
                    [
                        'user_id' => auth()->user()->id,
                        'item_id' => Str::random(9),
                        'item_name' => $this->item_name[$key],
                        'item_qty' => $this->item_qty[$key],
                        'item_price' => $this->item_price[$key],
                    ]
                );
            }
        }
        $this->items_in_cart = CartItems::all();

        return notyf()
            ->position('x', 'right')
            ->position('y', 'top')->addSuccess('Items added successfully');
    }

    protected $rules = [
        'name' => 'required|min:3',
        'phone' => 'required',
        'address' => 'required',
        'advance' => 'required|numeric',
        'balance' => 'required|numeric',
        'due_date' => 'required',
        'description' => 'required',
        'description' => 'required|min:4',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function addSale()
    {
        $this->validate();

        // $sale_code = strtoupper(Str::random(1)) . rand(4, 9999);
        $this->price = $this->items_in_cart->sum('item_price');

        $sale = new Order();
        $sale->sale_code = $this->sale_code;
        $sale->name = $this->name;
        $sale->phone = $this->phone;
        $sale->address = $this->address;
        $sale->price = $this->items_in_cart->sum('item_price');
        $sale->quantity = $this->items_in_cart->sum('item_qty');
        $sale->advance = $this->advance;
        $sale->balance = $this->price - $this->advance;
        $sale->due_date = $this->due_date;
        $sale->description = $this->description;
        $sale->status = 'processing';
        $sale->items = $this->items_in_cart;
        $sale->save();

        // clear items in cart db
        foreach ($this->items_in_cart as $item) {
            $item->delete();
        }

        notyf()
            ->position('x', 'right')
            ->position('y', 'top')
            ->addSuccess('Record added successfully!');
        redirect()->to('admin/orders');
    }
}
