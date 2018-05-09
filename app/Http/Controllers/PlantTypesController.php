<?php

namespace App\Http\Controllers;
use App\PlantType; // refers to the PlantType class (refer to PlantType class in PlantType.php document)
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlantTypesController extends Controller {
    public function index() {
        $planttypes = PlantType::where('systemID', app('system')->id)->get();// this is available via AppServiceProvider.php (as a result of the word "singleton")
        return view('planttypes.index', compact('planttypes'));
    }

    public function create() {
        return view('planttypes.create');
    }

    public function store(Request $request){
       
        $newplanttype = PlantType::create([
            'name' => $request['name'],
            'comments' => $request['comments'],
            'systemID' => app('system')->id, // this is available via AppServiceProvider.php (as a result of the word "singleton")
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);
        return redirect('planttypes');
    }

    public function edit($id) {
        $planttype = PlantType::find($id);
        return view('planttypes.edit')->with('planttype', $planttype);
    }


    public function update(Request $request) {
        $planttype = PlantType::find($request['id']);    
        $planttype->name = $request['name'];
        $planttype->comments = $request['comments'];        
        $planttype->updated_at = Carbon::now()->toDateTimeString();
        $planttype->save();
        return redirect('planttypes');
    }

    public function destroy($id) {
        PlantType::destroy($id);
        $planttypes = PlantType::all();
        return view('planttypes.index', compact('planttypes'));
    }

}
