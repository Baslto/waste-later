<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'markets_stock';
    public $timestamps = false;

    protected $fillable = [
        'market_id',
        'product_id',
        'price',
        'price_reduced',
        'mhd',
        'stock'
    ];

    public function scopeGetStockByMarketId(Builder $query, $id): void
    {
        $query->where('market_id', $id);
    }

    public function scopeGetStockByPLZ(Builder $query, $id): void
    {
        $query->where('market_id', $id);
    }
}
