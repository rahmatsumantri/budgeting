<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'month',
        'year',
        'total_income',
        'total_outcome',
        'balance'
    ];
}
