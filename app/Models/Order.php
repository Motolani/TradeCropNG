<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'product_id', 'quantity','seller_id','buyer_id','transaction_id','status','cart_request_id','total_items'
    ];
}
