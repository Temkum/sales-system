<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class ProductCategories extends Component
{
    use WithPagination;
    public $search_item;

    public function deleteProduct($id)
    {
        $product = ProductCategory::find($id);

        if ($product->image) {
            unlink('assets/img/products/' . $product->image);
        }
        $product->delete();

        session()->flash('success', 'Product deleted successfully!');
    }

    public function render()
    {

        $search = '%' . $this->search_item . '%';

        $products = ProductCategory::where('prod_name', 'LIKE', $search)->orWhere('price', 'LIKE', $search)->orderBy('created_at', 'DESC')->paginate(10);

        $this->resetPage();

        return view('livewire.product-categories', ['products' => $products])->extends('base');
    }
}