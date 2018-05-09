<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'comments', 'systemID', 'entity', 'entityID', 'imageFileName', 'share', 'userID'
    ];

    // userID refers to the person that enters the comments
    // entity specifies either "plants" or "users" (notes could be entered for plants and users only)
    // entityID refers to the ID associated with the entity (if "plants", then entityID = plantID; if "users", then entityID = userID) 
}
