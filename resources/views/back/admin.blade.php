@extends('layouts.app')

@section('title', 'MyDashboard')

@section('content')

    @foreach($sites as $site)
        <div class="col s12 m7">
            <h2 class="header">{{ $site->site_url }}</h2>
            <div class="card horizontal">
                <div class="card-image">
                    @php $find = 0; @endphp

                    @foreach($albums as $album)
                        @if($album->user_id == $site->user_id && $find == 0)
                            @php $find = 1;@endphp
                            @php $findPhoto = 0; @endphp
                            @foreach($photos as $photo)
                                @if($album->id == $photo->album_id && $album->user_id == $site->user_id && $findPhoto == 0)
                                    <img src="{{ $photo->url }}">
                                    @php $findPhoto = 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p>Site crée le <strong>{{ $site->created_at }}</strong>.</p>
                        <p>Modifié la derniere fois le <strong>{{ $site->updated_at }}</strong>.</p>
                    </div>
                    <div class="card-action">
                        <a href="/site/{{$site->site_url }}" title="Voir le site" target="_blank"><i class="material-icons">send</i></a>
                        {!! Form::open( array( 'route' =>array('close-site') , 'method' => 'post' )) !!}
                        <input type="hidden" value="{{  $site->id }}" name="id_site">
                        <button class="btn waves-effect waves-light" type="submit" name="action" title="Fermer le site">Cloturer le site
                            <i class="material-icons right">send</i>
                        </button>
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