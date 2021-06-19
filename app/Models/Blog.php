<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    use HasFactory;

    protected $table = 'blog';
    protected $fillable = [
        'category_id',
        'title',
        'body',
        'status',
        'writer_id',
        'checker_status',
    ];
    /**
     * status of checker role
     */
    public const checker_status = [
        'published' => 'published',
        'checking' => 'checking',
        'rejected' => 'rejected',
        're_write' => 're_write',
        'warning' => 'warning',
        'new' => 'new',
    ];

    /**
     * @var  status of writer
     */
    public const writer_status = [
        'draft' => 'draft',
        'publish' => 'publish',
    ];


    public function tags(){
        $this->belongsToMany(BlogTag::class);
    }


}
