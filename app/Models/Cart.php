<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity', 'image'];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function users() {
        return $this->hasMany(User::class);
    }

}
