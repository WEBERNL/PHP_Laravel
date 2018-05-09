<?php

namespace App\Http\Controllers;
use App\Plant; // refers to the Plant class (refer to Plant class in Plant.php document)
use App\PlantType;
use App\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlantsController extends Controller{
    public function index() {
        $plants = Plant::where('systemID', app('system')->id)->get(); // this is available via AppServiceProvider.php (as a result of the word "singleton")
        
        return view('plants.index', compact('plants'));
    }

    
    public function create() {
        $rooms = Room::where('systemID', app('system')->id)->get(['id', 'name']);
        $planttypes = PlantType::where('systemID', app('system')->id)->get(['id', 'name']);
        return view('plants.create', compact('plants', 'rooms', 'planttypes'));
    }

    
    public function store(Request $request) {
     
        $newPlant = Plant::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // this is available via AppServiceProvider.php (as a result of the word "singleton")
            'planttypeID' => $request['planttype'],
            'roomID' => $request['room'],
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect('plants');
    }

    public function edit($id) {
        $plant = Plant::find($id);
        $rooms = Room::where('systemID', app('system')->id)->get(['id', 'name']); // this is available via AppServiceProvider.php (as a result of the word "singleton")
        $planttypes = PlantType::where('systemID', app('system')->id)->get(['id', 'name']);// this is available via AppServiceProvider.php (as a result of the word "singleton")
        return view('plants.edit', compact('plant', 'rooms', 'planttypes'));
       
    }

    
    public function update(Request $request) {
      
        $Plant = Plant::find($request['id']);        
        $Plant->name = $request['name'];
        $Plant->comments = $request['comments'];
        
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads'; // identifying the public/uploads folder in firstLaravel
                $filename = 'plant' . '_' . app('system')->id . '_'  . $request['id'] . '_'  . $file->getClientOriginalName();
                $file->move($destinationPath, $filename); // moving the image to the public/uploads folder in firstLaravel  
                $filename = '/uploads' . '\\' . $filename;
                
                $Plant->imageFileName = $filename;
             }
        }

        $Plant->roomID = $request['room'];
        $Plant->planttypeID = $request['planttype'];            
        $Plant->updated_at = Carbon::now()->toDateTimeString();
        $Plant->save();
        return redirect('plants');
    }

   
    
    public function destroy($id){
        Plant::destroy($id);
        $plants = Plant::all();
        return view('plants.index', compact('plants'));
    }
}
