<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'markets';

    public function scopeGetMarketByPLZ(Builder $query, $plz): void
    {
        $query->where('plz', $plz);
    }
}
