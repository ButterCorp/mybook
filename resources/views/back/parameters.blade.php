@extends('layouts.app')

@section('title', 'MyParameters')

@section('content')
    <?php if (isset($data)) {
        echo "<pre>";
        var_dump($data->name);
        echo "</pre>";
    } ?>

    <div class="div-dashboard">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s4"><a href="#profile">MyProfile</a></li>
                </ul>
            </div>

        </div>
   </div>
   
@endsection