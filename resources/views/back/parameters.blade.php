@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

<div class="row">

    @foreach ($data as $graphNode)
        <div class="album col s4">
            <div class="photo-album">
                {{ $graphNode['photo'] }}
            </div>
            <div class="title-album">
                <h3>{{ $graphNode['name'] }}</h3>
            </div>
        </div>
    @endforeach

</div>

   
@endsection