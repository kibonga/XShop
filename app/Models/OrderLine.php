<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function product() {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
