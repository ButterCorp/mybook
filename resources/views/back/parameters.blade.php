@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

    <h2>Configuration</h2>

    <p>
        Veuillez sélectionner les photos que vous souhaitez afficher sur votre site vitrine,
        appuyez ensuite sur le bouton valider tout en bas de la page
    </p>

    <ul class="collapsible popout" data-collapsible="accordion">
        @foreach ($data as $graphNode)
            <li>
                <div class="collapsible-header"><i class="material-icons">filter_drama</i>
                    {{ $graphNode['name'] }}  </div>
                <div class="collapsible-body">
                    <div class="row">

                    <select multiple="multiple" class="image-picker show-html">
                    @if(isset($graphNode['photos']))
                        @foreach ($graphNode['photos'] as $link)
                            @if (isset($link["picture"]) && isset($graphNode['name']))


                                    
                                        
                                        <option data-img-src="{{ $link["picture"] }}" value="{{ $i }}"></option>
                                       <!-- <option><img class="responsive-img" src="" /></option>
                                       
                                        <span class="new badge" data-badge-caption="likes">{{ $link["likes"]->getTotalCount() }}</span> -->
                                    

                            @endif
                        @endforeach
                    @endif
                    </select>
                    </div>
                </div>
            </li>

        @endforeach
    </ul>

    <a class="btn" onclick="Materialize.toast('A toi de coder la suite !', 4000)">Valider</a><br><br><br>
@endsection
