<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'sale_code',
        'address',
        'phone',
        'price',
        'advance',
        'items',
        'due_date',
        'quantity',
        'balance',
        'status',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(ProductCategory::class);
    }
}