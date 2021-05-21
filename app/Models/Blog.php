<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public const checker_status = [
        'published' => 'published',
        'checking' => 'checking',
        'rejected' => 'rejected',
        're_write' => 're_write',
    ];

    public const writer_status = [
        'draft' => 'draft',
        'publish' => 'publish',
    ];



}
