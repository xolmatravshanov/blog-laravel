<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $table = 'subscriber';


    public function subscribers(){
        return $this->belongsToMany(User::class, 'subscriber', 'writer_id', 'subscriber_id');
    }

}

