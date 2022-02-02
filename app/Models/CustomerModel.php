<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = "customers";
    protected $fillable = ["username","email","mobilenum","country","address","postcode"];
}
