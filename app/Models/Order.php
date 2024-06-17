<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'additional_infromation',
        'cart_items',
    ];

    public function Order()
    {
        return $this->hasMany(Order::class);
    }
}
