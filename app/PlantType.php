<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlantType extends Model
{
    //attributes
    protected $fillable = [
        'name', 'comments', 'systemID'
    ];
}
