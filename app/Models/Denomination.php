<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    use HasFactory;

    protected $table='cashbalancelogs';

    protected $fillable=[
        'category_id',
        'user_id',
        'title',
        'date',
        'total_balance',
        'cash_type_10000',
        'cash_type_5000',
        'cash_type_1000',
        'cash_type_500',
        'cash_type_100',
        'cash_type_50',
        'cash_type_10',
        'cash_type_5',
        'cash_type_1',
        'updated_at',
        'created_at',
        'writer'
    ];
}
