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

<div class="row">
    <div class="col s12 m7">
        <div class="card">
            <div class="card-image">
                <img src="{{ $link["picture"] }}">
                <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
                <a href="#">This is a link</a>
            </div>
        </div>
    </div>
</div>

<a class="waves-effect waves-light btn">Valider</a><br><br><br>

@endsection