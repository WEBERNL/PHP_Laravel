<?php
namespace App\Http\Controllers\Auth;

use DB;
use App\User;
use App\System;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        System::insert([
            'name' => $data['systemName'],            
            'created_at' => now(),
        ]);

        $lastID = DB::getPDO()->lastInsertId();

        
        if(isset($data['imageFileName'])) {
            $file = $data['imageFileName'];
            if($file) {
                $destinationPath = public_path()  . '/uploads'; // identifying the public/uploads folder in firstLaravel
                $filename = 'system' . '_' . $lastID . '_'  . $file->getClientOriginalName();
                $file->move($destinationPath, $filename); // moving the image to the public/uploads folder in firstLaravel  
                $filename = '/uploads' . '\\' . $filename;
                
                $system = System::find($lastID); 
                $system->imageFileName = $filename;
                $system->updated_at = Carbon::now()->toDateTimeString();
                $system->save();
            }
        }else{
            $system = System::find($lastID); 
            $system->imageFileName = '/img' . '\\' . 'defaultImageFromPexels.jpg';
            $system->updated_at = Carbon::now()->toDateTimeString();
            $system->save();
        }


        return User::create([
            'systemID' => $lastID,
            'name' => $data['name'],
            'email' => $data['email'],
            'imageFileName' => "",
            'password' => Hash::make($data['password']),
        ]);
    }
}
