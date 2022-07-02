<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderLines() {
        return $this->hasMany(OrderLine::class);
    }

//    public function getTotalPrice() {
////        dd("Do i reach this");
////        dd($this->orderLines());
//        return $this->orderLines()->sum(function($line) {
//           return $line->quantity * $line->price;
//        });
//    }
}
