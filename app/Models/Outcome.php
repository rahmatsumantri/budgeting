<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

     ## Relasi balik ke OutcomeCategory
     public function outcamecategory()
     {
         return $this->belongsTo(OutcomeCategory::class, 'outcome_category_id');
     }
}
