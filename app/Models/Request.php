<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid',
        'passageexamid',
        'requestDate',
        'status',
        'responseDate',
        'responseMessage'
    ];



}
