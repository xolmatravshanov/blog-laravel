<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tag';


    public function blogs(){
        return $this->belongsToMany(Blog::class, 'blog_tag', 'blog_id', 'tag_id');
    }
}
