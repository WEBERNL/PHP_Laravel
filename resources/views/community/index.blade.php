
@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/community.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Community</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif 

                   

                    @foreach($notes as $note)
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                   
                                    @if($note->userImageFileName == null || $note->userImageFileName == "")
                                        <img class="communityNoteUserImage img-circle" src="{{ $note->systemImageFileName }}" style="width: 10%; height: auto" />                                   
                                    @else
                                        <img class="communityNoteUserImage img-circle" src="{{ $note->userImageFileName }}" style="width: 10%; height: auto"/>
                                    @endif 
                                   
                                    
                                    {{ $note->userName }}
                                    {{-- <small>{{ timeAgo($note->updated_at) }}</small> --}}
                                    <br /> 
                                    {{ $note->entityName }} ID: {{ $note->entityID }}
                                    <br />
                                    {{ $note->comments }} 
                                </td>
                            </tr>
                           
                            <tr style="text-align: center;">
                                <td>
                                    @if($note->imageFileName == null || $note->imageFileName == "")
                                        <img class="communityNoteImage" src="{{ $note->systemImageFileName }}" style="width: 30%; height: auto" />                                  
                                    @else
                                        <img class="communityNoteImage" src="{{ $note->imageFileName }}" style="width: 30%; height: auto"/>
                                    @endif 
                                    
                                </td>
                            </tr>
                           

                        </table>            
                    @endforeach
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


