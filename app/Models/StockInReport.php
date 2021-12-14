<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockInReport extends Model
{
    use HasFactory;

    protected $table = 'stock_in_report';

    protected $fillable = [
        'total_stock',
        'tracking_id',
    ];
}
