<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;

class EditProduct extends Component
{
    use WithFileUploads;

    public $prod_name, $slug, $price, $short_desc, $image, $images, $new_image, $product_id;

    public function mount($product_slug)
    {
        $product = ProductCategory::where('slug', $product_slug)->first();

        $this->prod_name = $product->prod_name;
        $this->slug = $product->slug;
        $this->price = $product->price;
        $this->image = $product->image;
        $this->short_desc = $product->short_desc;
        $this->product_id = $product->id;
        $this->new_image = $product->new_image;
    }

    public function generateSlug()
    {
        $rand_num = rand(5000, 9000);
        $this->slug = Str::slug($this->prod_name, '-');
        $this->slug = $this->slug . $rand_num;
    }

    public function updateProduct()
    {
        $this->validate([
            'prod_name' => 'required',
            'slug' => 'required',
            'price' => 'required|numeric',
            'short_desc' => 'required',
            'product_id' => 'required',
        ]);

        if ($this->new_image) {
            $this->validate([
                'new_image' => 'required|mimes:png,jpg,jpeg|max:1024'
            ]);
        }

        $product = ProductCategory::find($this->product_id);
        $product->prod_name = $this->prod_name;
        $product->slug = $this->slug;
        $product->short_desc = $this->short_desc;
        $product->price = $this->price;

        if ($this->new_image) {
            #remove previous image
            if (!$product->image) {
                unlink('assets/img/products' . '/' . $product->image);
            }

            # set new img
            $imageName = $this->prod_name . '.' . $this->new_image->extension();
            $this->new_image->storeAs('products', $imageName);
            $product->image = $imageName;
        }
        $product->save();

        session()->flash('success', 'Product update successful!');
        redirect()->to('admin/products');
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->extends('base');
    }
}