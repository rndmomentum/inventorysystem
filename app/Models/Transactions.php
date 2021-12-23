<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'tracking_id',
        'name',
        'category_id',
        'location_id',
        'suppliers_id',
        'size_id',
        'invoice_id',
        'image',
        'total_stock',
        'minimum_stock',
        'type_transaction',
        'purpose',
        'stock_in_id',
        'stock_status',
        'short_code',
        'notes',
        'stock_out_status',
    ];
}
