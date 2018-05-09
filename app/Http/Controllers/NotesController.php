<?php

namespace App\Http\Controllers;
use App\Note;
use App\Plant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class NotesController extends Controller {
 
    public function index($entity, $entityID) {
        
        $entityIdentifier = \DB::table($entity . 's')->get(['id', 'name'])->where('id', '=', (int)$entityID)->first();        
       
        $notes = Note::where('systemID', app('system')->id)
                     ->where('entity', $entity)
                     ->where('entityID', $entityID)
                     ->get();
               
        return view('notes.index')->with('notes', $notes)
                                  ->with('entity', $entity)
                                  ->with('entityID', $entityID)
                                  ->with('entityName', $entityIdentifier->name);
    } 

    public function create($entity, $entityID) {
        $entityIdentifier = \DB::table($entity . 's')->get(['id', 'name'])->where('id', '=', (int)$entityID)->first();        
        $entityDetail = [
            'entity' => $entity,
            'entityID' => $entityID,
            'entityName' => $entityIdentifier->name
        ];
        
        return view('notes.create')->with('entityDetail', $entityDetail);
    }


    public function store(Request $request){
        
        $newNote = Note::create([
            'entity' => $request['entity'],
            'entityID' => (int)$request['entityID'],
            'userID' => Auth::user()->id,
            'comments' => $request['comments'],
            'share' => $request['share'],
            'systemID' => app('system')->id, // this is available via AppServiceProvider.php (as a result of the word "singleton")
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),
        ])->id;
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads'; // identifying the public/uploads folder in firstLaravel
                $filename = 'note' . '_' . app('system')->id . '_' . $newNote . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);  // moving the image to the public/uploads folder in firstLaravel  
                $filename = '/uploads' . '\\' . $filename;
                //  update the note with the images
                $note = Note::find($newNote);
                $note->imageFileName = $filename;
                $note->save();   
                if($request['entity'] == 'plant') {
                    $plant = Plant::find($request['entityID']);
                    $plant->imageFileName = $filename;
                    $plant->save();
                }
            }                
        }
        return redirect()->route('notes.index', [
            'entity' => $request['entity'], 
            'entityID' => $request['entityID']
        ]);
    } 

    public function edit($id) { 
        $note = Note::find($id);          
        return view('notes.edit')->with('note', $note);       
    }

    public function update(Request $request) {
      
        $note = Note::find($request['id']);        
        $note->comments = $request['comments']; 
        $note->share = $request['share'];       
        $note->updated_at = Carbon::now()->toDateTimeString();
        $note->save();

        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads'; // identifying the public/uploads folder in firstLaravel
                $filename = 'note' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename); // moving the image to the public/uploads folder in firstLaravel  
                $filename = '/uploads' . '\\' . $filename;
                //  update the note with the images
                $note = Note::find($request['id']);
                $note->imageFileName = $filename;
                $note->save();   
                if($request['entity'] == 'plant') {
                    $plant = Plant::find($request['entityID']);
                    $plant->imageFileName = $filename;
                    $plant->save();
                }
            }                
        }
       
           
        return redirect()->route('notes.index', [
            'entity' => $request['entity'], 
            'entityID' => $request['entityID']
        ]);
    }
   
    public function destroy($entity, $entityID, $id) 
    {
        
        Note::destroy($id);
        $note = Note::all();
        return redirect()->route('notes.index', [
            'entity' => $entity, 
            'entityID' => $entityID
        ]);
    }



}
