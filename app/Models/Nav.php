<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nav
 *
 * @method static \Database\Factories\NavFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Nav newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nav newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nav query()
 * @mixin \Eloquent
 */
class Nav extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'route', 'ordering'
    ];
}
