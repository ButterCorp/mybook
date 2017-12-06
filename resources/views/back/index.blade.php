@extends('layouts.app')

@section('title', 'MyDashboard')

@section('content')
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, quisquam quo. Accusamus atque autem
                    esse illum in, ipsum minus natus pariatur porro quae quis, quo soluta tempora unde voluptatem
                    voluptatum.</p>
                <p>A aspernatur dolores non omnis tenetur! A ab accusantium ad asperiores cumque dolore eos eveniet
                    libero maiores mollitia placeat porro repudiandae, sed sequi tempora, tenetur voluptas. Quas,
                    veritatis, vero. Aspernatur?</p>
                <p>Aspernatur, cumque dicta doloribus eveniet id ipsam itaque iusto labore maxime molestiae nulla,
                    numquam odio provident, quaerat quo recusandae rem repellendus reprehenderit repudiandae vel! Ab
                    aperiam dolorum iste mollitia nam.</p>
            </div>
            <div id="book" class="col s12 book">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header active"><i class="material-icons">create</i>Appearence</div>
                        <div class="collapsible-body">
                            <div class="row link-appearence-dashboard">
                                <a href="#">General </a>|
                                <a href="#">Menu </a>|
                                <a href="#">Template </a>|
                                <a href="#">Font</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">picture_in_picture</i>Albums</div>
                        <div class="collapsible-body">
                            <span>Lorem ipsum dolor sit amet.</span>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">folder</i>Content</div>
                        <div class="collapsible-body">
                            <span>Lorem ipsum dolor sit amet.</span>
                        </div>
                    </li>
                </ul>
            </div>
            <div id="settings" class="col s12">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam, assumenda, aut dignissimos dolor
                    ducimus fugiat ipsum magni natus nobis odit, repellendus reprehenderit. Ex libero nobis praesentium
                    quos repellendus, temporibus totam.</p>
                <p>Ab adipisci aliquam aperiam cumque distinctio doloremque eveniet exercitationem fuga hic in itaque,
                    minus nam quae quaerat quis ratione soluta ullam. Assumenda distinctio eum explicabo illum nemo
                    quibusdam vel voluptates.</p>
            </div>
        </div>
    </div>
@endsection