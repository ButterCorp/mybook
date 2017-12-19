@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

<h2>Configuration</h2>
<p>Veuillez sélectionner les photos que vous souhaitez afficher sur votre site vitrine</p>

@foreach ($data as $graphNode)
    @foreach ($graphNode['photos'] as $link)
        <div class="row">
            <div class="album col s4">
                <img src="{{ $link["picture"] }}" alt="{{ $graphNode['name'] }}">
            </div>
            <div class="col s1">
                <p>
                    <input type="checkbox" id="test5" />
                    <label for="test5">Red</label>
                </p>
            </div>
        </div>
    @endforeach
@endforeach

@endsection