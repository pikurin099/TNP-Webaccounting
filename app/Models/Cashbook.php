<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cashbook extends Model
{
    use HasFactory;

    protected $table='cashbooks';

    protected $fillable=[
        'id',
        'date',
        'year',
        'month',
        'description',
        'amount',
        'transaction_type',
        'category',
        'balance',
        'cash_type_10000',
        'cash_type_5000',
        'cash_type_1000',
        'cash_type_500',
        'cash_type_100',
        'cash_type_50',
        'cash_type_10',
        'cash_type_5',
        'cash_type_1',
        'created_at',
        'updated_at'
    ];
}
