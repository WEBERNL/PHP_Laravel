
@extends('layouts.app') <!-- this refers to layouts/app.blade.php-->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" >Users <br >
                    <a href="/users/create" >Add User</a>
                </div>

                <div class="card-body">

                    <table class="table" border='1'>
                        <tr>
                            <td></td>
                            <td>Name</td>
                            <td>Email</td>
                            <td></td>
                            <td></td>
                        </tr>
                       

                        @foreach($users as $user)
                        <tr>
                            
                            <td>
                                @if($user['imageFileName'] == null || $user['imageFileName'] == "")
                                    <img src="{{app('system')->imageFileName}}" style="width: 100px; height: auto" class="rounded imgPopup">                                   
                                @else
                                    <img src="{{$user['imageFileName']}}" style="width: 100px; height: auto" class="rounded imgPopup">
                                @endif    
                            </td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td><a href="/users/edit/{{ $user['id'] }}">Edit</a></td> 
                            <td><a href='/notes/user/{{$user['id']}}'>Notes</a></td>                          
                        </tr>
                      
                        @endforeach                         
                    </table>
                    
                    <!--
                    <div class="container" style="border: 1px solid purple;">
                        <div class="row" >
                            <div class="col-md-2"></div>
                            <div class="col-md-4" style="font-weight: bold;">Name</div>
                            <div class="col-md-5" style="font-weight: bold;">Email</div>
                            <div class="col-md-1"></div>
                        </div>
                       

                        @foreach($users as $user)
                        <div class="row" >
                            
                            <div class="col-sm-2">
                                @if($user['imageFileName'] == null || $user['imageFileName'] == "")
                                    <img src="{{app('system')->imageFileName}}" style="width: 100px; height: auto" class="rounded imgPopup">                                   
                                @else
                                    <img src="{{$user['imageFileName']}}" style="width: 100px; height: auto" class="rounded imgPopup">
                                @endif    
                            </div>
                            <div class="col-sm-4" >{{ $user['name'] }}</div>
                            <div class="col-sm-5" >{{ $user['email'] }}</div>
                            <div class="col-sm-1" ><a href="/users/edit/{{ $user['id'] }}">Edit</a></div>                           
                        </div>
                      
                        @endforeach                         
                    </div>
                    -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection