<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormModel extends Model
{
    protected $table="product_form";
    protected $fillable = ["product_id","title","type","options"];
}
