<?php

namespace App\Http\Livewire\Admin;

use App\Models\Cart;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\ProductCategory;

class NewOrder extends Component
{
  public $name, $phone, $address, $quantity, $due_date, $status, $description;
  public $balance, $advance;
  public $price;
  public $prod_qty;
  public $product_code;
  public $items = [];

  public $products =  [];
  public $msg = '';
  public $prod_in_cart;
  public $prod_name;

  public function mount()
  {
    $this->products = ProductCategory::all();
    $this->prod_in_cart = Cart::all();
  }

  public function increaseQty($prod_id)
  {
    $cart_product = Cart::find($prod_id);
    $cart_product->increment('product_qty', 1);

    $update_price = $cart_product->product_qty * $cart_product->product->price;

    $cart_product->update(['product_price' => $update_price]);
    $this->mount();
  }

  public function decreaseQty($prod_id)
  {
    $cart_product = Cart::find($prod_id);

    if ($cart_product->product_qty <= 1) {
      // return session()->back()->with('info', $cart_product->product->product_name . "'s quantity can't be less than 1. Increase the quantity or remove items from cart!");
      return $msg = ($cart_product->product->product_name . "'s quantity can't be less than 1. Increase the quantity or remove items from cart!");
    }

    $cart_product->decrement('product_qty', 1);
    $update_price = $cart_product->product_qty * $cart_product->product->price;

    $cart_product->update(['product_price' => $update_price]);
    $this->mount();
  }

  public function insertToOrderSummary()
  {
    $product = ProductCategory::where('id', $this->product_code)->first();

    // check prod if available
    if (!$product) {

      return $this->msg = 'Product not found!';
    }

    $num_of_prods = Cart::where('product_id', $product->id)->count();

    if ($num_of_prods > 0) {
      return $this->msg = $product->prod_name . 'is already added. Please increase the product quantity!';
    } else {
      $add_to_cart = new Cart();
      $add_to_cart->user_id = auth()->user()->id;
      $add_to_cart->product_id = $product->id;
      $add_to_cart->product_price = $product->price;
      $add_to_cart->product_qty = 1;
      $add_to_cart->save();

      $this->prod_in_cart->push($add_to_cart);

      // clear input fields
      $this->product_code = '';

      return $this->msg = 'Product added successfully!';
    }
  }

  public function removeItem($prod_id)
  {
    $remove_prod = Cart::find($prod_id);
    $remove_prod->delete();

    $this->msg = 'Product removed!';

    $this->prod_in_cart = $this->prod_in_cart->except($prod_id);
  }

  public function updated($fields)
  {
    $this->validateOnly($fields, [
      'name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'price' => 'required',
      // 'quantity' => 'required',
      'advance' => 'required',
      'balance' => 'required',
      'due_date' => 'required',
      'description' => 'required',
    ]);
  }

  public function addSale()
  {
    $this->validate([
      'name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'price' => 'required',
      // 'quantity' => 'required',
      'advance' => 'required',
      'balance' => 'required',
      'due_date' => 'required',
      'description' => 'required',
    ]);

    $ran_str = strtoupper(Str::random(1));
    $ran_num = rand(4, 9999);
    $sale_code = $ran_str . $ran_num;

    $sale = new Order();
    $sale->sale_code = $sale_code;
    $sale->name = $this->name;
    $sale->phone = $this->phone;
    $sale->address = $this->address;
    $sale->price = $this->price;
    $sale->quantity = $this->prod_in_cart->sum('product_qty');
    $sale->advance = $this->advance;
    $sale->balance = $this->price - $this->advance;
    $sale->due_date = $this->due_date;
    $sale->description = $this->description;
    $sale->status = 'processing';
    $sale->items = $this->prod_in_cart;
    $sale->save();

    // clear items
    foreach ($this->prod_in_cart as $item) {
      $this->removeItem($item->id);
    }

    session()->flash('success', 'Sale order added successfully!');
    redirect()->to('admin/orders');
  }

  public function render()
  {
    if ($this->advance != '') {
      $total_amt = $this->prod_in_cart->sum('product_price');
      $this->balance = $total_amt;
    }

    $this->prod_in_cart = Cart::all();

    return view('livewire.admin.order-form')->extends('base');
  }
}