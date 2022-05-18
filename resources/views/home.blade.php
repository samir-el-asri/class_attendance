@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!Auth::guest())
                <h1>Welcome {{Auth::user()->name}}!</h1>
            @endif
        </div>
    </div>
</div>
@endsection
