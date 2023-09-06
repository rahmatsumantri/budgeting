<?php

namespace App\Models;

use App\Models\Outcome;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutcomeCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    ## Relasi ke Outcame
    public function outcome()
    {
        return $this->hasMany(Outcome::class);
    }
}
