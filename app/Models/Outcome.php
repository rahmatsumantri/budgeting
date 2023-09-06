<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'date',
        'outcome_category_id',
        'name',
        'description',
        'budget'
    ];
}
