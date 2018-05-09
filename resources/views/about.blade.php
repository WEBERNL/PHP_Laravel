
@extends('layouts.app') <!-- this refers to layouts/app.blade.php-->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    About!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
