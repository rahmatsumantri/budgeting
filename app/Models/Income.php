<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'date',
        'name',
        'description',
        'budget'
    ];
}
