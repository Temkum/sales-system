<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ProductCategory;

class ProductCategories extends Component
{
    use WithPagination;

    public function render()
    {
        $products = ProductCategory::orderBy('created_at', 'DESC')->paginate(13);

        return view('livewire.product-categories', ['products' => $products])->extends('base');
    }
}