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
                                            <input id="title" type="text" class="validate">
                                            <label for="title">Titre</label>
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
                                            <input id="slug" type="text" class="validate">
                                            <label for="slug">Slug</label>
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
                <?php if (isset($error)) { echo $error ;} ?>
                {!! Form::submit('Click Me!'); !!}
                {!! Form::close() !!}

                <div class="col s10 offset-s1" style="border: 2px solid red;">
                    <h3>Informations personnelles</h3>
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s4">
                                <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                                <label for="first_name">Prenom</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="last_name" type="text" class="validate">
                                <label for="last_name">Nom</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="email" type="text" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="col s5 offset-s1 form-margin-top" style="border: 2px solid pink;">
                    <h3>Paramètres généraux</h3>
                    <div class="col s12">
                        <label>
                            <input type="checkbox" id="comments" />
                            <label for="comments">Commentaires</label>
                        </label>
                    </div>
                    <div class="col s12">
                        <label>
                            <input type="checkbox" id="albums" />
                            <label for="albums">Albums</label>
                        </label>
                    </div>
                </div>

                <div class="col s5  form-margin-top" style="border: 2px solid pink;">
                    <h3>Utilitaire</h3>
                    <div class="col s12">
                        <label>
                            <input type="checkbox" id="maintenance" />
                            <label for="maintenance">Site en maintenance</label>
                        </label>
                    </div>

                    <div class="input-field col s12" style="border: 2px solid yellow">
                        <select>
                            <option value="" disabled selected>Choix du template</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div>
        @foreach ($albums as $album)
            <span>{{ $album->title }}</span>
        @endforeach
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>