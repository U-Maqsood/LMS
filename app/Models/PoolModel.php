<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class PoolModel extends Model
{
    protected $table = "pool";
    protected $fillable = ["poolname","isdeleted"];
}
