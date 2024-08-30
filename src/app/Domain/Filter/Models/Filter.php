<?php

namespace App\Domain\Filter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    protected $table = 'filters';

    public const MODEL_NAME = 'filters';

    protected $fillable = [
        'title',
    ];
}
