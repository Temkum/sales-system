<?php

namespace App\Models;

use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Event;

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
        'description',
        'client_id',
        'reminder_off'
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

    function getDueDate()
    {
        return $this->due_date;
    }

    function checkAndBroadcastDueDate()
    {
        if ($this->status == 'completed' && !$this->reminder_off && $this->due_date->isTomorrow) {
            Event::dispatch('order.due', $this);
            broadcast(new Order($this->this));
        }
    }
}
