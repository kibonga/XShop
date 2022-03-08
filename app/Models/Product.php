<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Product
 *
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name', 'description', 'model_id', 'color_id'
    ];

    public function model() {
        return $this->belongsTo(ProductModel::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function prices() {
        return $this->hasMany(Price::class);
    }

    public function scopeWithRelations(Builder $query): Builder
    {
        return $query->with('category')
                ->with('images')
                ->with('prices');
    }

}
