<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommunityController extends Controller {
    
    public function index() {
        $notes = DB::select('SELECT 
                                notes.entityID AS entityID,
                                notes.comments AS comments,
                                notes.imageFileName AS imageFileName,
                                notes.updated_at AS updated_at,
                                plants.name AS entityName,
                                systems.imageFileName AS systemImageFileName,
                                users.name AS userName,
                                users.imageFileName AS userImageFileName                              
                               
                               
                            FROM 
                                notes
                                INNER JOIN plants ON notes.entityID = plants.id
                                INNER JOIN systems ON notes.systemID = systems.id
                                INNER JOIN users ON notes.userID = users.id                           
                               
                               
                            WHERE
                                notes.share = 1
                            ORDER BY 
                                notes.updated_at DESC');
        
        return view('community.index', compact('notes'));
    }

    
}