@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

    <h2>Configuration</h2>

    <p>
        Veuillez sélectionner les photos que vous souhaitez afficher sur votre site vitrine,
        appuyez ensuite sur le bouton valider tout en bas de la page
    </p>
    {!! Form::open( array( 'route' => 'parametersUpload', 'method' => 'post' )) !!}
    {{ csrf_field() }}
    <ul class="collapsible popout" data-collapsible="accordion">
        @foreach ($albums as $graphNode)
            <li>
                <div class="collapsible-header active"><i class="material-icons">filter_drama</i>
                    {{ $graphNode['name'] }}  </div>
                <div class="collapsible-body">
                    <div class="row">
                        <select multiple="multiple" name="{{ $graphNode['id'] }}-{{ $graphNode['name'] }}[]" class="image-picker show-html">
                            @if(isset($graphNode['photos']))
                                @foreach ($graphNode['photos'] as $link)


                                    <?php $source = ""; ?>
                                    @foreach($link["images"] as $item)
                                        @if($item["height"] > 300 && $item["height"] < 600 & $item['width'] > 300 & $item['width'] < 600)
                                            <?php $source = $item["source"]; ?>
                                        @endif
                                    @endforeach

                                    @if($source == "")
                                        <?php $source = $link["images"][0]["source"]; ?>
                                    @endif

                                    @if (isset($link["images"][0]["source"]) && isset($graphNode['name']))

                                        <option data-img-src="{{ $source }}" value="{{ $source }}"></option>

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
    {!! Form::submit() !!}
    {!! Form::close() !!}

@endsection