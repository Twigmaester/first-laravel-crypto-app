<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinPair extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'coin1',
        'coin2',
    ];
}
