<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function scopeGetProductById(Builder $query, $id): void 
    {
        $query->where('id', $id);
    }
}
