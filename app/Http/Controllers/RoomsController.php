<?php

namespace App\Http\Controllers;
use App\Room; // refers to the Room class (refer to Room class in Room.php document)
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomsController extends Controller {
    public function index() {
        $rooms = Room::where('systemID', app('system')->id)->get(); // this is available via AppServiceProvider.php (as a result of the word "singleton")
        return view('rooms.index', compact('rooms'));
    }
    
    public function create() {
        return view('rooms.create');
    }
   
    public function store(Request $request) {
        
        $newRoom = Room::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // this is available via AppServiceProvider.php (as a result of the word "singleton")
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect('rooms');
    }

    public function edit($id) {
        $room = Room::find($id);
        return view('rooms.edit')->with('room', $room);
    }
    
    public function update(Request $request) {
       
        $room = Room::find($request['id']);
        
            $room->name = $request['name'];
            $room->comments = $request['comments'];
            
            $room->updated_at = Carbon::now()->toDateTimeString();
            $room->save();
            return redirect('rooms');
    }
    
    public function destroy($id){
        Room::destroy($id);
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }
}

