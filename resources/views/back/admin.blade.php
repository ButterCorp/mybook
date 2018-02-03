@extends('layouts.app')

@section('title', 'MyDashboard')

@section('content')

    @foreach($sites as $site)
        <div class="col s12 m7">
            <h2 class="header">{{ $site->site_url }}</h2>
            <div class="card horizontal">
                <div class="card-image">
                    @foreach($albums as $album)

                            @if($album->user_id = $site->user_id )
                                @if ($loop->first) {{-- Recuperer le premier album de l'user en cours --}}
                                    @foreach($photos as $photo)
                                        @if($album->id = $photo->albums_id && $album->user_id = $site->user_id)
                                            @if ($loop->first) {{-- Recuperer la premiere photo de l'album en cours --}}
                                                <img src="{{ $photo->url }}">
                                            @endif
                                         @endif
                                    @endforeach
                                @endif
                            @endif

                    @endforeach
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p>Site crée le <strong>{{ $site->created_at }}</strong>.</p>
                        <p>Modifié la derniere fois le <strong>{{ $site->updated_at }}</strong>.</p>
                    </div>
                    <div class="card-action">
                        <a href="{{ $host . '/site/' .$site->site_url }}" title="Voir le site"><i class="material-icons">send</i></a>
                        {!! Form::open( array( 'route' =>array('close-site') , 'method' => 'post' )) !!}
                        <input type="hidden" value="{{  $site->id }}" name="id_site">
                            <button type="submit" title="Fermer le site"><i class="material-icons">send</i></button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        $(document).ready(function() {

            @if (Session::has('message'))
                Materialize.toast("{{ Session::get('message') }}", 10000);
            @endif

        });

    </script>

@endsection