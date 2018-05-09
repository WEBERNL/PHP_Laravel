<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    //attributes
    protected $fillable = [
        'name', 'comments', 'imageFileName', 'systemID', 'roomID', 'planttypeID'
    ];
}
