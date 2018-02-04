<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>MyBook - Welcome</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/image/template/MyBookTwo/favicon.png') }}" />
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">


</head>

<body>
<aside class="profile-card">
    <header>
        @if(!Auth::check())
            <a href="{{ $login }}">
        @else
            <a href="/indexBack">
        @endif
            <img src="{{ asset('/image/facebook-img.png') }}" class="hoverZoomLink">
        </a>

        <h1>
            @if(!Auth::check())
                Ravi de vous rencontrer
            @else
                Ravi de vous revoir, {{ Auth::user()->name }}
            @endif
        </h1>


        <h2>
            @if(!Auth::check())
                Créez votre site grâce a votre profil facebook
            @else
                Continuez à créer votre site !
            @endif
        </h2>

    </header>

    <div class="profile-bio">

        <p>
            @if(!Auth::check())
                Créer votre site en un clic en important vos données facebook, vous aurez juste à choisir le contenu a afficher
            @else
                Le saviez vous ? Vous pouvez ré-importer vos photos en <a href="/parameters">suivant ce lien</a>. Déselectionner une photo
                déjà importée pour la supprimer.
            @endif
        </p>

    </div>

    <ul class="profile-social-links">
        <li>
            <a target="_blank" href="">
                <i class=""></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="https://www.facebook.com/butter.corp.35">
                <i class="fa fa-facebook"></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="https://github.com/ButterCorp/mybook">
                <i class="fa fa-github"></i>
            </a>
        </li>
        <li>
            <a target="_blank" href="/cgu">
                <i class="fa fa-info"></i>
            </a>
        </li>
    </ul>
</aside>


</body>
</html>
<script>
@if (Session::has('message'))
    Materialize.toast("{{ Session::get('message') }}", 10000);
@endif
</script>