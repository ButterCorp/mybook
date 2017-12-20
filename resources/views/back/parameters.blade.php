@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

<h2>Configuration</h2>
<p>
    Veuillez sélectionner les photos que vous souhaitez afficher sur votre site vitrine,
    appuyez ensuite sur le bouton valider tout en bas de la page
</p>

@foreach ($data as $graphNode)
    @if(isset($graphNode['photos']))
            @foreach ($graphNode['photos'] as $link)
                <div class="album col s4">
                    <div class="photo-album">
                            @if (isset($link["picture"]) && isset($graphNode['name']))
                                @if ($loop->first)
                                    <img src="{{ $link["picture"] }}" alt="{{ $graphNode['name'] }}">
                                @endif
                            @endif
                    </div>
                    <div class="title-album">
                        @if ($loop->first)
                            <h3>{{ $graphNode['name'] }}</h3>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
@endforeach


<a class="btn" onclick="Materialize.toast('A toi de coder la suite !', 4000)">Valider</a><br><br><br>
@endsection
