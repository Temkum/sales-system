<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\ProductCategory;
use Livewire\Component;

class AddOrder extends Component
{
    public $name, $slug, $phone, $address, $quantity, $due_date, $balance, $status, $description;
    public  $price;
    public $advance;

    /* 
    public $items = []; //templates
    public $products; //all_templates
    public $prod_items = ['']; //questions

    public $saved = FALSE;     
 
    public function mount()
    {
        $this->products = ProductCategory::all();
    }

    public function addItem()
    {
        $this->prod_items[] = '';
    }

     public function addItem()
    {
        if (!in_array($this->prod_item, $this->items)) {
            array_push($this->inputs, $this->prod_item);
            array_push($this->items, $this->prod_item);
        }
    } */

    /* public function removeItem($item)
    {
        unset($this->inputs[$item]);
    } */

    /*  public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'items' => 'required',
            'quantity' => 'required',
            'advance' => 'required|numeric',
            'balance' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ]);
    } 

    public function removeItem($index)
    {
        unset($this->prod_items[$index]);
        $this->prod_items = array_values($this->prod_items);
        $this->items = [];
    }

    public function updated($key, $value)
    {
        $this->saved = FALSE;

        $parts = explode('.', $key);

        if (count($parts) == 2 && $parts[0] == 'items') {
            // dd($this->products);

            $prod_item = $this->products->where('id', $value)->first()->prod_name;
            dd($prod_item);
            if ($prod_item) {
                $this->prod_items[$parts[1]] = $prod_item;
            }
        }
    }

    public function saveItems()
    {
        $item = ProductCategory::create();

        foreach ($this->prod_items as $prod_item) {
            $item->prod_items()->create(['prod_name' => $prod_item]);
        }

        $this->reset('prod_items', 'items');
        $this->saved = TRUE;
    }
*/
    public $products =  [];
    public $prod_items = ['']; //questions


    public function mount()
    {
        $products = ProductCategory::all();
    }
    public function addSale()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'items' => 'required',
            'quantity' => 'required',
            'advance' => 'required|numeric',
            'balance' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ]);

        $sale = new Order();
        $sale->name = $this->name;
        $sale->phone = $this->phone;
        $sale->address = $this->address;
        $sale->price = $this->price;
        $sale->quantity = $this->quantity;
        $sale->advance = $this->advance;
        $sale->balance = $this->price - $this->advance;
        $sale->due_date = $this->due_date;
        $sale->description = $this->description;
        $sale->items = $this->items;


        $sale->save();
    }

    public function render()
    {
        // return view('livewire.admin.add-order')->extends('base');
        return view('livewire.admin.order-form')->extends('base');
    }
}