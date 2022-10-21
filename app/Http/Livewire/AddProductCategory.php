<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddProductCategory extends Component
{
    use WithFileUploads;

    public $prod_name, $slug, $price, $short_desc, $image, $images;

    public function generateSlug()
    {
        $rand_num = rand(5000, 9000);
        $this->slug = Str::slug($this->prod_name, '-');
        $this->slug = $this->slug . $rand_num;
    }

    public function addProduct()
    {
        // validate input
        $this->validate([
            'prod_name' => 'required',
            'slug' => 'required|unique:product_categories',
            'price' => 'required|numeric',
            'short_desc' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:5000'
        ]);

        $product = new ProductCategory();
        $product->prod_name = $this->prod_name;
        $product->slug = $this->slug;
        $product->price = $this->price;
        $product->short_desc = $this->short_desc;

        $rand_num = rand(5000, 9000);
        $imageName = $this->prod_name[0] . $rand_num . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;

        $product->save();

        session()->flash('success', 'Product created successfully!');
        redirect()->to('admin/products');
    }

    public function render()
    {
        return view('livewire.add-product-category')->extends('base');
    }
}