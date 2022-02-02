<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery_images';

    public function gallery(){
        return $this->belongsTo(CourseModel::class,'course_id');
    }

    use HasFactory;
}
