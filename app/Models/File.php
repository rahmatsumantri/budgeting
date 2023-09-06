<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'type_id',
        'file'
    ];
}
