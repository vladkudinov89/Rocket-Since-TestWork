<?php

namespace App\Domain\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    public const PRODUCT_LIMIT = 40;
    public const PRODUCT_OFFSET = 0;

    protected $fillable = [
        'title',
        'count',
        'price'
    ];
}
