<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //attributes
    protected $fillable = [
        'name', 'comments', 'systemID'
    ];
}
