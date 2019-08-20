<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Sparent as Authenticatable;
use Laravel\Passport\HasApiTokens;


use Illuminate\Database\Eloquent\Model;


class Bus extends Model
{

     protected $fillable = ['driver_name' ,'email' ,'password'];

}
