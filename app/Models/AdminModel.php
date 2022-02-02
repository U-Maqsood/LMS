<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $table = "admins";

    protected $fillable = [
        'username',
        'dob',
        'address',
        'gender',
    ];
}
