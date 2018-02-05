@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
    <nav>
        <div class="nav-wrapper grey darken-3">
            <div class="col s12">
                <a href="/indexBack" class="breadcrumb">MyDashboard</a>
                <a href="#!" class="breadcrumb">Admin Panel</a>
            </div>
        </div>
    </nav>

    <h1>Sites actifs</h1>
    @foreach($sitesActive as $site)
        <div class="col s12 m7">
            <h2 class="header">{{ $site->site_url }}</h2>
            <div class="card horizontal">
                <div class="card-image">
                    @php $find = 0; @endphp

                    @foreach($albums as $album)
                        @if($album->user_id == $site->user_id && $find == 0)
                            @php $find = 1;@endphp
                            @php $findPhoto = 0; @endphp
                            @foreach($photos as $photo)
                                @if($album->id == $photo->album_id && $album->user_id == $site->user_id && $findPhoto == 0)
                                    <a href="/site/{{$site->site_url }}">
                                        <img src="{{ $photo->url }}">
                                    </a>
                                    @php $findPhoto = 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <p>Site crée le <strong>{{ $site->created_at }}</strong>.</p>

                        <p>Modifié la derniere fois le <strong>{{ $site->updated_at }}</strong>.</p>

                        <p>Template en place : <strong>{{ (isset($site->template_selectionned)) ? $site->template_selectionned : 'Aucun template n\'est en place' }}</strong>.</p>

                        <p>Affichage des descriptions sur le site : <input type="checkbox" id="comment_show" {{ ($site->show_photo_description) ? 'checked="checked"' : '' }}  disabled="disabled" />
                            <label for="comment_show">{{ ($site->show_photo_description) ? 'Activé' : 'Désactivé' }}</label>

                        <p>Statut du slogan du site : <input type="checkbox" id="slug_content" {{ ($site->slug_statut) ? 'checked="checked"' : '' }}  disabled="disabled" />
                            <label for="slug_content">{{ ($site->slug_statut) ? 'Activé' : 'Désactivé' }}</label>

                        @if($site->slug_statut)
                            <p>Slogan du site : <strong>{{ (isset($site->slug_content)) ? $site->slug_content : "Réalisez votre site en deux clics grâce a votre compte facebook"}}</strong> </p>
                        @endif

                        <p>Statut du footer du site : <input type="checkbox" id="footer_content" {{ ($site->footer_statut) ? 'checked="checked"' : '' }}  disabled="disabled" />
                            <label for="footer_content">{{ ($site->footer_statut) ? 'Activé' : 'Désactivé' }}</label>

                        @if($site->footer_statut)
                            <p>Contenu du footer sur le site : <strong>{{ (isset($site->footer_content)) ? $site->footer_content : "©Copyright 2018 ButterCorp All Rights Reserved"}}</strong> </p>
                        @endif

                        <p>Statut des liens vers les réseaux sociaux du site : <input type="checkbox" id="footer_content" {{ ($site->network_statut) ? 'checked="checked"' : '' }}  disabled="disabled" />
                            <label for="footer_content">{{ ($site->network_statut) ? 'Activé' : 'Désactivé' }}</label>

                        @if($site->network_statut)
                            @if(isset($site->facebook_url))
                                <div class="input-field col s8 offset-s2">
                                    <i class="material-icons prefix"><i class="fa fa-facebook-square"></i></i>
                                    <input id="icon_prefix" type="text" name="url_facebook" disabled="disabled" value="{{  $site->facebook_url }}">
                                    <label for="icon_prefix">URL du compte Facebook</label>
                                </div>
                            @endif
                            @if($site->instagram_url)
                                <div class="input-field col s8 offset-s2">
                                    <i class="material-icons prefix"><i class="fa fa-instagram"></i></i>
                                    <input id="icon_prefix" type="text" name="url_instagram" disabled="disabled" value="{{ $site->instagram_url }}">
                                    <label for="icon_prefix">URL du compte Instagram</label>
                                </div>
                            @endif
                            @if(isset($site->google_url))
                                <div class="input-field col s8 offset-s2">
                                    <i class="material-icons prefix"><i class="fa fa-google-plus"></i></i>
                                    <input id="icon_prefix" type="text" name="url_google" disabled="disabled" value="{{ $site->google_url }}">
                                    <label for="icon_prefix">URL du compte Google+</label>
                                </div>
                            @endif
                            @if(isset($site->twitter_url))
                                <div class="input-field col s8 offset-s2">
                                    <i class="material-icons prefix"><i class="fa fa-twitter-square"></i></i>
                                    <input id="icon_prefix" type="text" name="url_twitter" disabled="disabled" value="{{ $site->twitter_url }}">
                                    <label for="icon_prefix">URL du compte Twitter</label>
                                </div>
                            @endif
                            @if(isset($site->linkedin_url))
                                <div class="input-field col s8 offset-s2">
                                    <i class="material-icons prefix"><i class="fa fa-linkedin-square"></i></i>
                                    <input id="icon_prefix" type="text" name="url_linkedin" disabled="disabled" value="{{ $site->linkedin_url }}">
                                    <label for="icon_prefix">URL du compte LinkedIn</label>
                                </div>
                            @endif
                        @endif
                    </div>
                    <div class="card-action">
                        <div class="row">
                            <a href="/site/{{$site->site_url }}" title="Voir le site" target="_blank" class="waves-effect waves-light btn">Voir le site <i class="material-icons right">send</i></a>
                            {!! Form::open( array( 'route' =>array('close-site') , 'method' => 'post' )) !!}
                            <input type="hidden" value="{{  $site->id }}" name="id_site">
                            <button class="btn waves-effect waves-light" type="submit" name="action" title="Fermer le site">Cloturer le site
                                <i class="material-icons right">delete_forever</i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($sitesNotActive != "[]")
        <h1>Sites inactifs</h1>
        @foreach($sitesNotActive as $site)
            <div class="col s12 m7">
                <h2 class="header">{{ $site->site_url }}</h2>
                <div class="card horizontal">
                    <div class="card-image">
                        @php $find = 0; @endphp

                        @foreach($albums as $album)
                            @if($album->user_id == $site->user_id && $find == 0)
                                @php $find = 1;@endphp
                                @php $findPhoto = 0; @endphp
                                @foreach($photos as $photo)
                                    @if($album->id == $photo->album_id && $album->user_id == $site->user_id && $findPhoto == 0)
                                        <img src="{{ $photo->url }}">
                                        @php $findPhoto = 1; @endphp
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>Site crée le <strong>{{ $site->created_at }}</strong>.</p>

                            <p>Modifié la derniere fois le <strong>{{ $site->updated_at }}</strong>.</p>

                            <p>Template en place : <strong>{{ (isset($site->template_selectionned)) ? $site->template_selectionned : 'Aucun template n\'est en place' }}</strong>.</p>

                            <p>Affichage des descriptions sur le site : <input type="checkbox" id="comment_show" {{ ($site->show_photo_description) ? 'checked="checked"' : '' }}  disabled="disabled" />
                                <label for="comment_show">{{ ($site->show_photo_description) ? 'Activé' : 'Désactivé' }}</label>

                            <p>Statut du slogan du site : <input type="checkbox" id="slug_content" {{ ($site->slug_statut) ? 'checked="checked"' : '' }}  disabled="disabled" />
                                <label for="slug_content">{{ ($site->slug_statut) ? 'Activé' : 'Désactivé' }}</label>

                            @if($site->slug_statut)
                                <p>Slogan du site : <strong>{{ (isset($site->slug_content)) ? $site->slug_content : "Réalisez votre site en deux clics grâce a votre compte facebook"}}</strong> </p>
                            @endif

                            <p>Statut du footer du site : <input type="checkbox" id="footer_content" {{ ($site->footer_statut) ? 'checked="checked"' : '' }}  disabled="disabled" />
                                <label for="footer_content">{{ ($site->footer_statut) ? 'Activé' : 'Désactivé' }}</label>

                            @if($site->footer_statut)
                                <p>Contenu du footer sur le site : <strong>{{ (isset($site->footer_content)) ? $site->footer_content : "©Copyright 2018 ButterCorp All Rights Reserved"}}</strong> </p>
                            @endif

                            <p>Statut des liens vers les réseaux sociaux du site : <input type="checkbox" id="footer_content" {{ ($site->network_statut) ? 'checked="checked"' : '' }}  disabled="disabled" />
                                <label for="footer_content">{{ ($site->network_statut) ? 'Activé' : 'Désactivé' }}</label>

                            @if($site->network_statut)
                                @if(isset($site->facebook_url))
                                    <div class="input-field col s8 offset-s2">
                                        <i class="material-icons prefix"><i class="fa fa-facebook-square"></i></i>
                                        <input id="icon_prefix" type="text" name="url_facebook" disabled="disabled" value="{{  $site->facebook_url }}">
                                        <label for="icon_prefix">URL du compte Facebook</label>
                                    </div>
                                @endif
                                @if($site->instagram_url)
                                    <div class="input-field col s8 offset-s2">
                                        <i class="material-icons prefix"><i class="fa fa-instagram"></i></i>
                                        <input id="icon_prefix" type="text" name="url_instagram" disabled="disabled" value="{{ $site->instagram_url }}">
                                        <label for="icon_prefix">URL du compte Instagram</label>
                                    </div>
                                @endif
                                @if(isset($site->google_url))
                                    <div class="input-field col s8 offset-s2">
                                        <i class="material-icons prefix"><i class="fa fa-google-plus"></i></i>
                                        <input id="icon_prefix" type="text" name="url_google" disabled="disabled" value="{{ $site->google_url }}">
                                        <label for="icon_prefix">URL du compte Google+</label>
                                    </div>
                                @endif
                                @if(isset($site->twitter_url))
                                    <div class="input-field col s8 offset-s2">
                                        <i class="material-icons prefix"><i class="fa fa-twitter-square"></i></i>
                                        <input id="icon_prefix" type="text" name="url_twitter" disabled="disabled" value="{{ $site->twitter_url }}">
                                        <label for="icon_prefix">URL du compte Twitter</label>
                                    </div>
                                @endif
                                @if(isset($site->linkedin_url))
                                    <div class="input-field col s8 offset-s2">
                                        <i class="material-icons prefix"><i class="fa fa-linkedin-square"></i></i>
                                        <input id="icon_prefix" type="text" name="url_linkedin" disabled="disabled" value="{{ $site->linkedin_url }}">
                                        <label for="icon_prefix">URL du compte LinkedIn</label>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="card-action">
                            {!! Form::open( array( 'route' =>array('open-site') , 'method' => 'post' )) !!}
                            <input type="hidden" value="{{  $site->id }}" name="id_site">
                            <button class="btn waves-effect waves-light" type="submit" name="action" title="Ouvrir le site">Ré-ouvrir le site
                                <i class="material-icons right">send</i>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script>
        $(document).ready(function() {

            @if (Session::has('message'))
                Materialize.toast("{{ Session::get('message') }}", 10000);
            @endif

        });

    </script>

@endsection