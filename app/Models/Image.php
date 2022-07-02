<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'path'
    ];

    public function imageable() {
        return $this->morphTo();
    }

    public function url() {
        return Storage::url($this->path);
    }
}
