<?php

namespace App\Domain\Filter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilterValue extends Model
{
    use HasFactory;

    protected $table = 'product_filter_value';
    protected $fillable = [
        'product_id',
        'product_filter_id'
    ];
}
