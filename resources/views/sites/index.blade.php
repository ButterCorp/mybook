<h1>Site {{ $nom_site  }}</h1>

@foreach ($photos as $photo)
    <img src="{{ $photo->url  }}" alt="photo">
@endforeach