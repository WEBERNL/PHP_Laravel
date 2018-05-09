<?php

namespace App\Http\Controllers;

use App\User; // refers to the User class (refer to User class in User.php document)
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::where('systemID', app('system')->id)->get(); // this is available via AppServiceProvider.php (as a result of the word "singleton")
        return view('users.index', compact('users')); // note that the compact method refers to the $users variable via this syntax: compact('users')
    }

    public function create(){
       return view('users.create');
    }

    
    // the create function takes a single parameter that is actually an array
    public function store(Request $request){


        $filename = "";
        if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads';
                $filename = 'user' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);  
                $filename = '/uploads' . '\\' . $filename;
                // $system->imageFileName = $filename;
            }                
        }

        $newUser = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'systemID' => app('system')->id, // this is available via AppServiceProvider.php (as a result of the word "singleton")
            'password' => bcrypt($request['password']),
            'imageFileName' => $filename,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString(),

        ]);
        return redirect('users');
     }

     

     public function edit($id){
        // accessing the user information from the database via the $id variable
         $user = User::find($id);
         return view('users.edit')->with('user', $user);
     }

     public function update(Request $request){      
       $user = User::find($request['id']);
       $user->name = $request['name'];
       $user->email = $request['email'];
      
       if($request->hasFile('imageFileName')) {
            $file = $request->file('imageFileName');
            if($file) {
                $destinationPath = public_path()  . '/uploads';
                $filename = 'user' . '_' . app('system')->id . '_' . $request['id'] . '_' . $file->getClientOriginalName();
                $file->move($destinationPath, $filename);  
                $filename = '/uploads' . '\\' . $filename;
                $user->imageFileName = $filename;
            }                
        }
       
       $user->updated_at = Carbon::now()->toDateTimeString();
       $user->save();
       return redirect('users');
     }

     public function destroy($id){
         User::destroy($id);
         $users = User::all();
         return view('users.index', compact('users'));
     }
}
