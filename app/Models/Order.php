<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'orders';

    protected $casts = [
        'measurements' => 'array',
    ];

    protected $fillable = [
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

    public function routeNotificationForVonage($notification)
    {
        return $this->phone;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}