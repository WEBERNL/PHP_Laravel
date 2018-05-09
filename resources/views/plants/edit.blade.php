@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> 
                <div class="card-header">{{ __('Edit Plant') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="post" action="/plants/{{ $plant->id }}">
                        {{ csrf_field() }}

                        <input value='{{ $plant->id }}' type="hidden" id="id" name="id"> 					    

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value='{{ $plant->name }}' required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="room" class="col-md-4 col-form-label text-md-right">{{ __('Room') }}</label>

                            <div class="col-sm-6">	
                                    <select class="form-control" name="room" id="room">
                                        <option value="">Select Room</option>
                                        @foreach($rooms as $room)
                                            @if($room->id == $plant->roomID)
                                                <option value="{{$room->id}}" selected>{{$room->name}}</option>
                                            @else
                                                <option value="{{$room->id}}">{{$room->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="planttype" class="col-md-4 col-form-label text-md-right">{{ __('Plant Type') }}</label>

                            <div class="col-sm-6">	
                                    <select class="form-control" name="planttype" id="planttype">
                                        <option value="">Select Plant Type</option>
                                        @foreach($planttypes as $planttype)
                                            @if($planttype->id == $plant->planttypeID)
                                                <option value="{{$planttype->id}}" selected>{{$planttype->name}}</option>
                                            @else
                                                <option value="{{$planttype->id}}">{{$planttype->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comments" class="col-md-4 col-form-label text-md-right">{{ __('Comments') }}</label>

                            <div class="col-md-6">                                
                                <textarea id='comments' name="comments" rows='3' cols='44' maxlength='1000'>{{ $plant->comments }}</textarea>
                                @if ($errors->has('comments'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comments') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Plant
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href='/plants/destroy/{{ $plant->id }}'>
                                    DELETE PLANT
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection