<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>MyBook - Welcome</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{ asset('/css/homepage.css') }}">


</head>

<body>
<aside class="profile-card">
    <header>
        <!-- here’s the avatar -->
        <a href="/facebook/login">
            <img src="{{ asset('/image/facebook-img.png') }}" class="hoverZoomLink">
        </a>

        <!-- the username -->
        <h1>
            Ravi de vous rencontrer
        </h1>

        <!-- and role or location -->
        <h2>
            Créez votre site grâce a votre profil facebook
        </h2>

    </header>

    <!-- bit of a bio; who are you? -->
    <div class="profile-bio">

        <p>
            Créer votre site en un clic en important vos données facebook, vous aurez juste à choisir le contenu a afficher
        </p>

    </div>

    <!-- some social links to show off -->
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
            <a target="_blank" href="https://github.com/vipulsaxena">
                <i class="fa fa-github"></i>
            </a>
        </li>
    </ul>
</aside>


</body>
</html>
