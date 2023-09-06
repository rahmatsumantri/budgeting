<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
