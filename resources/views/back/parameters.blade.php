@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')

<div class="row">
<pre>
    @foreach ($data as $graphNode)
        <?php var_dump($grahNode); ?>
        <div class="album col s4">
            <div class="photo-album">
                @foreach ($graphNode['photos'] as $link)
                    @if ($loop->first)
                        <img src="{{ $link["picture"] }}" alt="{{ $graphNode['name'] }}">
                    @endif
                 @endforeach
            </div>
            <div class="title-album">
                <h3>{{ $graphNode['name'] }}</h3>
            </div>
        </div>
    @endforeach

</div>

   
@endsection