<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceModel extends Model
{   
    protected $table = 'resources';
    
    protected $fillable = [
        'title',
        'description',
    ];

    public function courses(){
        return $this->belongsTo(CourseModel::class,'course_id');
    }

    use HasFactory;
}
