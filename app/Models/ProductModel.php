<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'ordering'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}