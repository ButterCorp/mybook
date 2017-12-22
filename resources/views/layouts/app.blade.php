<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>myBook - @yield('title')</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css"  media="screen,projection"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/image-picker.css') }}">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="container">
    @yield('content')
</div>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
<!-- Counter JQuery -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{ asset('/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('/js/image-picker.js') }}"></script>
      <script>
         $(document).ready(function() {
            $('select').imagepicker();
         });
      </script>
</body>
</html>