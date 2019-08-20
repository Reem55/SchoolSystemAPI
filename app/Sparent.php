<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Sparent as Authenticatable;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Sparent extends Model
{
       protected $fillable = ['name' ,'email' ,'password'];

}
