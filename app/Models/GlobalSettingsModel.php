<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalSettingsModel extends Model
{   

    protected $table = 'global_settings';

    protected $fillable = [
        'site_name',
        'currency_symbol',
        'contact_name',
        'contact_number',
        'address',
        'short_description',
        'long_description',
        'facebook',
        'twitter',
        'instagram',
    ];

    use HasFactory;
}
