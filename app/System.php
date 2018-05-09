<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    // attributes
    protected $fillable = [
        'name', 'imageFileName',
    ];
}
