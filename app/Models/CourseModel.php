<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    protected $table = 'courses';
    
    protected $fillable = [
        'title',
        'short_description',
        'long_description',
        'instructor',
        'price',
        'tags',
    ];

    public function resources(){
        return $this->hasMany(ResourceModel::class,'course_id');
    }

    public function gallery(){
        return $this->hasMany(GalleryModel::class,'course_id');
    }

    use HasFactory;
}
