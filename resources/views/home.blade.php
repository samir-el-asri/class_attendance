@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (!Auth::guest())
                @switch(Auth::user()->fonction)
                    @case("admin")
                        @include('homepages.admin')
                        @break
                    @case("enseignant")
                        @include('homepages.enseignant')
                        @break
                    @case("etudiant")
                        @include('homepages.etudiant')
                        @break
                    @default
                @endswitch
            @endif
        </div>
    </div>
</div>
@endsection