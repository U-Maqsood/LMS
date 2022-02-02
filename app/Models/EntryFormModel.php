<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class EntryFormModel extends Model
{

    protected $table = "entry_forms";
    protected $fillable = ["mt5id","selected_customer","selectedPoles","saleagent","phonenum","email","sentmoney","currency","deposit","firstdeposit","redeposit","created_by"];


}
