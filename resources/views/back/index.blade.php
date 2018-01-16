@extends('layouts.app')

@section('title', 'MyDashboard')

@section('content')
    <script>
        jQuery(document).ready(function( $ ) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
    <div class="div-dashboard">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s4"><a href="#profile">MyProfile</a></li>
                    <li class="tab col s4"><a class="active" href="#book">MyBook</a></li>
                    <li class="tab col s4"><a href="#settings">MySettings</a></li>
                </ul>
            </div>


            <div id="profile" class="col s12">
                <div class="row">
                    <h3 class="text-align" style="color: #424242;">Trending this week</h3>
                </div>
                <div class="col s6 offset-s3">
                    <span class="counter">1,234,567.00</span>
                    <span>$</span><span class="counter">1.99</span>
                    <span class="counter">12345</span>

                </div>
            </div>


            <div id="book" class="col s12 book">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">create</i>Appearence</div>
                            <div class="collapsible-body">
                                <div class="row link-appearence-dashboard">
                                    <a href="#">General </a>|
                                    <a href="#">Menu </a>|
                                    <a href="#">Template </a>|
                                    <a href="#">Font</a>
                                </div>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s3 offset-s1">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Title</label>
                                        </div>
                                        <div class="col s3 offset-s3 form-margin-top">
                                            <label>
                                                <input type="checkbox" id="footer" />
                                                <label for="footer">Footer</label>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s3 offset-s1">
                                            <input id="last_name" type="text" class="validate">
                                            <label for="last_name">Slug</label>
                                        </div>
                                        <div class="col s3 offset-s3 form-margin-top">
                                            <label>
                                                <input type="checkbox" id="sidebar" />
                                                <label for="sidebar">Sidebar</label>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">picture_in_picture</i>Albums</div>
                        <div class="collapsible-body">
                            <div class="row">
                                @foreach ($photos as $photo)
                                    <div class="col s4">
                                        <img class="responsive-img materialboxed" data-caption="{{ $photo->id }}" src="{{ $photo->url }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">folder</i>Content</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s12">
                                    <ul class="tabs">
                                        <li class="tab col s4 disabled"><a href="#footer-content">Footer</a></li>
                                        <li class="tab col s4 disabled"><a href="#slug-content">Slug</a></li>
                                        <li class="tab col s4"><a class="active" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div id="footer-content" class="col s12">Test 1</div>
                                <div id="slug-content" class="col s12">Test 2</div>
                                <div id="contact" class="col s12 div-dashboard">
                                    <div class="row">
                                        <form class="col s12">
                                            <div class="row">
                                                <div class="input-field col s6">
                                                    <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                                                    <label for="first_name">Phone number</label>
                                                </div>
                                                <div class="input-field col s6">
                                                    <input id="last_name" type="text" class="validate">
                                                    <label for="last_name">Email</label>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="settings" class="col s12">
                {!! Form::open(['url' => 'indexBack/']) !!}
                <p>Veuillez choisir un nom pour votre site</p>
                <?php echo Form::label('site_name', 'Nom du site'); ?>
                <?php echo Form::text('site_name'); ?>
                {!! Form::submit('Click Me!'); !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <div class="carousel">
        @foreach ($photos as $photo)
            <a class="carousel-item" href="#{{ $photo->id }}!"><img src="{{ $photo->url }}"></a>
        @endforeach
    </div>
    <div>
        @foreach ($albums as $album)
            <span>{{ $album->title }}</span>
        @endforeach
    </div>
@endsection