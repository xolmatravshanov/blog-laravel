<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    use HasFactory;

    protected $table = 'blog';

    public const checker_status = [
        'published' => 'published',
        'checking' => 'checking',
        'rejected' => 'rejected',
        're_write' => 're_write',
        'warning' => 'warning',
        'new' => 'new',
    ];

    public const writer_status = [
        'draft' => 'draft',
        'publish' => 'publish',
    ];





}
