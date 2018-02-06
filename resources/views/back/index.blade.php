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

    @if(!Session::has('first') && !($site->template_selectionned))
        <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
            <a id="menu" class="btn btn-floating btn-large cyan" onclick="$('.tap-target').tapTarget('close')"><i class="material-icons">menu</i></a>
        </div>

        <div class="tap-target cyan" data-activates="menu">
            <div class="tap-target-content white-text">
                <h5>Bonjour de MyBook !</h5>
                <p class="white-text">Bienvenue sur MyBook v0.1 Bêta. <br>L'import de vos photos s'est effectué avec succès, pour pouvoir visualiser votre site il faut impérativement renseigner un
                    template dans l'onglet MySettings puis dans la partie Utilitaire :-)</p>
            </div>
        </div>
    @endif

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
                    {{-- <h2 class="center"><a href="/site/{{ $site->site_url }}"  target="_blank">Voir mon site</a></h2> --}}
                </div>
                <div class="col s8 offset-s2">
                    <canvas id="line-chart" width="800" height="450"></canvas>
                </div>
            </div>


            <div id="book" class="col s12 book">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">create</i>Général</div>
                            <div class="collapsible-body">
                                <div class="row link-appearence-dashboard">
                                    {{--<a href="#">General </a>|
                                    <a href="#">Template </a>|
                                    <a href="#">Font</a>--}}

                                </div>
                            <div class="row">

                                    <div class="row">
                                        <div class="input-field col s3 offset-s1">
                                            {!! Form::open( array( 'route' => 'edit-site', 'method' => 'post' )) !!}
                                            {!! Form::label('site_name', 'Nom du site')  !!}
                                            {!! Form::text('site_name', ($site->title) ? $site->title : '') !!}
                                            {{-- //qui a mis ça ? ca sert a quoi????? --}}
                                            <?php if (isset($error)) { echo $error ;} ?>
                                        </div>
                                        <div class="col s3 offset-s3 form-margin-top">
                                            <label>
                                                <input onChange="verif();" name="footer" {{ ($site->footer_statut) ? 'checked' : '' }} type="checkbox" id="footer" class="footer" />
                                                <label for="footer">Footer</label>
                                            </label>
                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                    <div class="row">
                                        <div class="col s3 offset-s1 form-margin-top">
                                            <input id="social_network" onChange="verif();" name="network" {{ ($site->network_statut) ? 'checked' : '' }} type="checkbox" class="validate" >
                                            <label for="social_network">Réseaux sociaux</label>
                                        </div>
                                        <div class="col s3 offset-s3 form-margin-top">
                                            <label>
                                                <input onChange="verif();" name="slug" {{ ($site->slug_statut) ? 'checked' : '' }} type="checkbox" id="slug" />
                                                <label for="slug">Slogan</label>
                                            </label>
                                        </div>
                                    </div>
                                <button class="btn waves-effect waves-light right" type="submit" name="action">Mettre à jour
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                                {!! Form::close() !!}
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">picture_in_picture</i>Albums</div>
                        <div class="collapsible-body">

                            <ul class="collapsible" data-collapsible="accordion">
                                @foreach($albums as $album)
                                    <li>
                                        <div class="collapsible-header"><i class="material-icons">filter_drama</i>{!! str_replace('_', ' ', $album->title) !!} </div>
                                        <div class="collapsible-body">
                                            <span>
                                                <div class="row">
                                                    @foreach ($photos as $photo)
                                                        @if($photo->album_id == $album->id)
                                                            <div class="col s4">
                                                                <img class="responsive-img materialboxed" onclick="toastDelete()" data-caption="Envoyer sur MyBook le : {{ $photo->updated_at    }}" src="{{ $photo->url }}">
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
                            <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Importer une photo sur Facebook</a>

                            <!-- Modal Structure -->
                            <div id="modal1" class="modal">
                                <div class="modal-content">
                                    <h4>Uploader une photo</h4>
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
                                        <div class="input-field">
                                            {!! Form::text('message','',['placeholder' => 'Publier sur Facebook avec un message']) !!}
                                        </div>
                                        <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
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
                        <div class="collapsible-header"><i class="material-icons">folder</i>Contenu</div>
                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s12">
                                    <ul class="tabs">
                                        <li id="1" class="tab col s4 disabled"><a href="#footer-content">Footer</a></li>
                                        <li id="2" class="tab col s4 disabled"><a href="#slug-content">Slogan</a></li>
                                        <li id="3" class="tab col s4 disabled"><a href="#social_network-content">Réseaux sociaux</a></li>
                                    </ul>
                                </div>
                                <div id="footer-content" class="input-field col s6 offset-s3">
                                    {!! Form::open( array( 'route' => 'edit-site-footer', 'method' => 'post' )) !!}
                                        <textarea name="footer-content" class="materialize-textarea" data-length="120">{{ ($site->footer_content) ?  $site->footer_content  : '©Copyright 2018 ButterCorp All Rights Reserved' }}
                                        </textarea>
                                        <button class="btn waves-effect waves-light right" type="submit" name="action">Modifier le footer
                                            <i class="material-icons right">send</i>
                                        </button>
                                    {{ Form::close() }}
                                </div>
                                <div id="slug-content" class="input-field col s6 offset-s3">
                                    {!! Form::open( array( 'route' => 'edit-site-slug', 'method' => 'post' )) !!}
                                        <textarea name="slug-content" class="materialize-textarea" data-length="120">
                                            {{ ($site->slug_content) ? $site->slug_content : 'Réalisez votre site en deux clics grâce a votre compte facebook' }}
                                        </textarea>
                                        <button class="btn waves-effect waves-light right" type="submit" name="action">Modifier le slogan
                                            <i class="material-icons right">send</i>
                                        </button>
                                    {{ Form::close() }}
                                </div>
                                <div id="social_network-content" class="col s12">
                                        <div class="row">
                                            {!! Form::open( array( 'route' => 'edit-site-network', 'method' => 'post' )) !!}
                                            <div class="row">
                                                <div class="input-field col s8 offset-s2">
                                                    <i class="material-icons prefix"><i class="fa fa-facebook-square"></i></i>
                                                    <input id="icon_prefix" type="text" name="url_facebook" class="validate" value="{{ (isset($site->facebook_url) ? $site->facebook_url : '') }}">
                                                    <label for="icon_prefix">URL du compte Facebook</label>
                                                </div>
                                                <div class="input-field col s8 offset-s2">
                                                    <i class="material-icons prefix"><i class="fa fa-instagram"></i></i>
                                                    <input id="icon_prefix" type="text" name="url_instagram" class="validate" value="{{ (isset($site->instagram_url) ? $site->instagram_url : '') }}">
                                                    <label for="icon_prefix">URL du compte Instagram</label>
                                                </div>
                                                <div class="input-field col s8 offset-s2">
                                                    <i class="material-icons prefix"><i class="fa fa-google-plus"></i></i>
                                                    <input id="icon_prefix" type="text" name="url_google" class="validate" value="{{ (isset($site->google_url) ? $site->google_url : '') }}">
                                                    <label for="icon_prefix">URL du compte Google+</label>
                                                </div>
                                                <div class="input-field col s8 offset-s2">
                                                    <i class="material-icons prefix"><i class="fa fa-twitter-square"></i></i>
                                                    <input id="icon_prefix" type="text" name="url_twitter" class="validate" value="{{ (isset($site->twitter_url) ? $site->twitter_url : '') }}">
                                                    <label for="icon_prefix">URL du compte Twitter</label>
                                                </div>
                                                <div class="input-field col s8 offset-s2">
                                                    <i class="material-icons prefix"><i class="fa fa-linkedin-square"></i></i>
                                                    <input id="icon_prefix" type="text" name="url_linkedin" class="validate" value="{{ (isset($site->linkedin_url) ? $site->linkedin_url : '') }}">
                                                    <label for="icon_prefix">URL du compte LinkedIn</label>
                                                </div>
                                            </div>

                                            <button class="btn waves-effect waves-light right" type="submit" name="action">Mettre à jour
                                                <i class="material-icons right">send</i>
                                            </button>
                                            {{ Form::close() }}
                                        </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="settings" class="col s12">
                <div class="col s10 offset-s1 z-depth-4">
                    <div >
                        <h3>Informations personnelles</h3>
                        <form class="col s12">
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="first_name" type="text" value="{{ $firstname }}" class="validate">
                                    <label for="first_name">Prenom</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="last_name" type="text" value="{{ $lastname }}" class="validate">
                                    <label for="last_name">Nom</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="email" type="email" value="{{ $email }}" class="validate">
                                    <label for="email">Email</label>
                                </div>
                                <button class="btn waves-effect waves-light right" type="submit" name="action">Changer
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col s10 l5 xl5 offset-s1 offset-l1 offset-xl1 form-margin-top z-depth-4">
                    <h3>Affichage de mes photos</h3>
                    <div class="row">
                        {{ Form::open( array( 'route' => 'edit-photo-display', 'method' => 'post' ))  }}
                            <div  class="col s12">
                                <label>
                                    <input type="checkbox" {{ ($site->show_count_likes) ? 'checked' : '' }} name="count_likes" id="count_likes" />
                                    <label for="count_likes">Afficher le nombre de likes</label>
                                </label>
                            </div>
                            <div  class="col s12">
                                <label>
                                    <input type="checkbox" {{ ($site->show_count_comments) ? 'checked' : '' }} name="count_comments" id="count_comments" />
                                    <label for="count_comments">Afficher le nombre de commentaires</label>
                                </label>
                            </div>
                            <div  class="col s12">
                                <label>
                                    <input type="checkbox" {{ ($site->show_photo_description) ? 'checked' : '' }} name="photo_description" id="photo_description" />
                                    <label for="photo_description">Afficher la description de mes photos</label>
                                </label>
                            <button class="btn waves-effect waves-light right" type="submit" name="action">Modifier
                                <i class="material-icons right">send</i>
                            </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="col s10 l4 xl4 offset-s1 offset-l1 offset-xl1 form-margin-top z-depth-4">
                    <h3>Utilitaire</h3>
                    <div class="row">
                        {!! Form::open( array( 'route' => 'edit-template', 'method' => 'post' )) !!}
                        <div class="col s12">
                            <label>
                                <input type="checkbox" {{ ($site->statut) ? '' : 'checked' }} name="maintenance" id="maintenance" />
                                <label for="maintenance">Site en maintenance</label>
                            </label>
                        </div>
                        <div class="input-field col s12">
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
                            <button class="btn waves-effect waves-light right" type="submit" name="action">Modifier
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script>

    $(document).ready(function() {
        $('#modal1').modal();
        $('select').material_select();

        @if(!Session::has('first') && !($site->template_selectionned))
            $('.tap-target').tapTarget('open');
        @endif
        @if (Session::has('message'))
            Materialize.toast("{{ Session::get('message') }}", 10000);
        @endif

        verif();
    });

         function verif ()
        {
            var etatFooter = document.getElementById('footer').checked;
            var etatSlug = document.getElementById('slug').checked;
            var etatSocial_network = document.getElementById('social_network').checked;

            var footerDiv = document.getElementById('footer-content');
            var slugDiv = document.getElementById('slug-content');
            var social_networkDiv = document.getElementById('social_network-content');

            if(etatFooter)
                document.getElementById('1').classList.remove('disabled');

            if(!etatFooter)
                document.getElementById('1').classList.add('disabled');

            if(etatSlug)
                document.getElementById('2').classList.remove('disabled');

            if(!etatSlug)
                document.getElementById('2').classList.add('disabled');

            if(etatSocial_network)
                document.getElementById('3').classList.remove('disabled');

            if(!etatSocial_network)
                document.getElementById('3').classList.add('disabled');
        }

        function toastDelete() {
            var $toastContent = $('<span>Pour supprimer une photo</span>').add($('<a href="/parameters"><button class="btn-flat toast-action">Cliquer ici</button></a>'));
            Materialize.toast($toastContent, 2000);
        }
    </script>
