<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usercredit extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid',
        'moduleid',
        'grade'
    ];
}
