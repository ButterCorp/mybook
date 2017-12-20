@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

<h2>Configuration</h2>
<p>
    Veuillez sélectionner les photos que vous souhaitez afficher sur votre site vitrine,
    appuyez ensuite sur le bouton valider tout en bas de la page
</p>

@foreach ($data as $graphNode)
    @foreach ($graphNode['photos'] as $link)
        <div class="row">
            <div class="album col s3">
                <img src="{{ $link["picture"] }}" alt="{{ $graphNode['name'] }}">
            </div>
            <div class="col s3">
                <p>
                    <input type="checkbox" id="{{ $link["picture"] }}" />
                    <label for="{{ $link["picture"] }}">Oui, je veux cette photo</label>
                </p>
            </div>
        </div>
    @endforeach
@endforeach

<a class="btn" onclick="Materialize.toast('A toi de coder la suite !', 4000)">Valider</a><br><br><br>
@endsection
