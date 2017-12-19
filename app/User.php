<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use SammyK\LaravelFacebookSdk\SyncableGraphNodeTrait;

class User extends Eloquent implements UserInterface
{
    use SyncableGraphNodeTrait;

    protected $hidden = ['access_token'];

}
