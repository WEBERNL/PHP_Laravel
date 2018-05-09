<?php

namespace App\Http\Controllers;
use App\System; // refers to the System class (refer to System class in System.php document)
use Illuminate\Http\Request;
use Carbon\Carbon;

class SystemsController extends Controller
{
    public function edit($id){
        // accessing the user information from the database via the $id variable
        $system = System::find($id);
        return view('systems.edit')->with('system', $system);

    }

    
    public function update(Request $request) {
       
        $system = System::find($request['id']);        
        $system->name = $request['name'];
        $system->updated_at = Carbon::now()->toDateTimeString();
        $system->save();
         

         if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads'; // identifying the public/uploads folder in firstLaravel
                $filename = 'system' . '_'  . $request['id'] . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename); // moving the image to the public/uploads folder in firstLaravel  
                $filename = '/uploads' . '\\' . $filename;
                
                $system = System::find($request['id']); 
                $system->imageFileName = $filename;
                $system->save();   
            }                
        }
        
         
        $system = System::find($request['id']);
        return redirect()->route('systems.edit', ['id' => $request['id']]);
    }
     
    
    
   
}
