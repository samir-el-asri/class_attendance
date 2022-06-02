@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!Auth::guest())
                <h2>Welcome!</h2>
            @endif
        </div>
    </div>
</div>
@endsection
