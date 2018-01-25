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
                                    <a href="#">Template </a>|
                                    <a href="#">Font</a>
                                </div>
                            <div class="row">

                                    <div class="row">
                                        <div class="input-field col s3 offset-s1">
                                            {!! Form::open(['url' => 'indexBack/']) !!}
                                            <?php echo Form::label('site_name', 'Nom du site'); ?>
                                            <?php echo Form::text('site_name'); ?>
                                            <?php if (isset($error)) { echo $error ;} ?>
                                            {!! Form::submit('Click Me!'); !!}
                                            {!! Form::close() !!}
                                        </div>
                                        <div class="col s3 offset-s3 form-margin-top">
                                            <label>
                                                <input onChange="verif();" type="checkbox" id="footer" class="footer" />
                                                <label for="footer">Footer</label>
                                            </label>
                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                <form class="col s12">
                                    <div class="row">
                                        <div class="input-field col s3 offset-s1">
                                            <input id="slug" onChange="verif();" type="text" class="validate">
                                            <label for="slug">Slug</label>
                                        </div>
                                        <div class="col s3 offset-s3 form-margin-top">
                                            <label>
                                                <input onChange="verif();" type="checkbox" id="sidebar" />
                                                <label for="sidebar">Slug</label>
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

                            <ul class="collapsible" data-collapsible="accordion">
                                @foreach($albums as $album)
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{ $album->title  }}</div>
                                        <div class="collapsible-body">
                                            <span>
                                                <div class="row">
                                                    @foreach ($photos as $photo)
                                                        @if($photo->albums_id == $album->id)
                                                            <div class="col s4">
                                                                <img class="responsive-img materialboxed" data-caption="{{ $photo->id }}" src="{{ $photo->url }}">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- Modal Trigger -->
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Envoyer une photo</a>

                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                                <div class="modal-content">
                                    <h4>Envoyer une nouvelle photo</h4>
                                    {!! Form::open(
                                  array(
                                      'route' => 'upload',
                                      'class' => 'form',
                                      'files' => true)) !!}
                                        <div class="file-field input-field">
                                            {{ csrf_field() }}
                                            <div class="btn">
                                                <span>File</span>
                                                {!! Form::file('image', null) !!}
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text">
                                            </div>
                                        </div>
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                            <i class="material-icons right">send</i>
                                        </button>
                                  {!! Form::close() !!}
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Quitter</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">folder</i>Content</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s12">
                                    <ul class="tabs">
                                        <li id="1" class="tab col s4 disabled"><a href="#footer-content">Footer</a></li>
                                        <li id="2" class="tab col s4 disabled"><a href="#slug-content">Slug</a></li>
                                        <li class="tab col s4"><a class="active" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div id="footer-content" class="input-field col s5 offset-s1 active">
                                    <input placeholder="Footer Title" type="text" class="validate"> 
                                </div>
                                <div id="slug-content" class="input-field col s6 offset-s1 active">
                                    <input placeholder="Slug" type="text" class="validate">
                                </div>
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
                <div class="col s10 offset-s1 border_info">
                    <div >
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
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col s5 offset-s1 form-margin-top border_info">
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
                    <div  class="col s12">
                        <button id="cached" class="right">
                            <i id="icons-cached" class="material-icons">cached</i>
                        </button>
                    </div>
                </div>

                <div class="col s4 offset-s1 form-margin-top border_info">
                    <h3>Utilitaire</h3>
                    <div class="col s12">
                        <label>
                            <input type="checkbox" id="maintenance" />
                            <label for="maintenance">Site en maintenance</label>
                        </label>
                    </div>
                        {!! Form::open( array( 'route' => 'edit-template', 'method' => 'post' )) !!}
                        <div class="input-field col s12" style="border: 2px solid yellow">
                            {{ csrf_field() }}
                            <select name="template">
                                <option disabled {{ ($site->template_selectionned) ?  '' : 'selected="selected"' }}>Choix du template</option>
                                @foreach($templates as $template)
                                    @if($template->template_name == $site->template_selectionned)
                                        <option value="{{ $template->template_name }}" selected="selected">{{ $template->template_name }}</option>
                                    @else
                                        <option value="{{ $template->template_name }}">{{ $template->template_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        {!! Form::submit('Click Me!'); !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

    $(document).ready(function() {
        $('#modal1').modal();
        $('select').material_select();

        @if (Session::has('message'))
            Materialize.toast("{{ Session::get('message') }}", 10000);
        @endif
    });

         function verif ()
        {

            var etatFooter = document.getElementById('footer').checked;
            var etatSlug = document.getElementById('sidebar').checked;


            var footerDiv = document.getElementById('footer-content');
            var slugDiv = document.getElementById('slug-content');


            if(etatFooter)
            {
            document.getElementById('1').classList.remove('disabled');

            }
            if (!etatFooter)
            {
            document.getElementById('1').classList.add('disabled');

            }

            if (etatSlug) {
            document.getElementById('2').classList.remove('disabled');

            }
            if (!etatSlug) {
            document.getElementById('2').classList.add('disabled');

            }

        };
    </script>
