@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

    <h2>Configuration</h2>

    <p>
        Veuillez sélectionner les photos que vous souhaitez afficher sur votre site vitrine,
        appuyez ensuite sur le bouton valider tout en bas de la page
    </p>

    {!! Form::open(['url' => 'back/']) !!}
        {{ Form::hidden('id', $info_user['id']) }}
        {{ Form::hidden('name', $info_user['name']) }}
        {{ Form::hidden('email', $info_user['email']) }}
    <ul class="collapsible popout" data-collapsible="accordion">
        @foreach ($album_user as $graphNode)
            <li>
                <div class="collapsible-header active"><i class="material-icons">filter_drama</i>
                    {{ $graphNode['name'] }}  </div>
                <div class="collapsible-body">
                    <div class="row">
                        <select multiple="multiple" name="{{ $graphNode['id'] }}-{{ $graphNode['name'] }}[]" class="image-picker show-html">
                            @if(isset($graphNode['photos']))
                                @foreach ($graphNode['photos'] as $link)
                                    @if (isset($link["picture"]) && isset($graphNode['name']))

                                        <option data-img-src="{{ $link["picture"] }}" value="{{ $link["picture"] }}"></option>

                                        <!-- <span class="new badge" data-badge-caption="likes">{{ $link["likes"]->getTotalCount() }}</span> -->

                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
        {!! Form::submit('Click Me!'); !!}
    {!! Form::close() !!}
@endsection