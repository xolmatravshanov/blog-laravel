<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * @var role
     */
    public const  role = [
        'writer' => 'writer',
        'reader' => 'reader',
        'admin' => 'admin',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function writer_posts(){
        $this->hasMany(Blog::class, 'writer_id', 'id');
    }

    public function checker_posts(){
        $this->hasMany(Blog::class, 'checker_id', 'id');
    }

    public function subscriber(){
        $this->hasMany(Subscriber::class);
    }


}
