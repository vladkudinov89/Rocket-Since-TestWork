<?php

namespace App\Domain\Filter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model
{
    use HasFactory;

    protected $table = 'product_filter';

    protected $fillable = [
        'title',
        'filter_id'
    ];
}
