<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersCredential extends Model
{
    protected $table = "users_credentials";
    protected $fillable = ["userid","userip","userbrowser","loggedin","verified"];
}
