<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * @var role
     */
    public const role = [
        'writer' => 'writer',
        'reader' => 'reader',
        'admin' => 'admin',
        'checker' => 'checker',
    ];

    /**
     * The attributes that are mass assignable.
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


    /**
     *  get all writer's blogs
     */
    public function writer_blogs()
    {
        $this->hasMany(Blog::class, 'writer_id', 'id');
    }


    /**
     *  gets all checker's blogs
     */
    public function checker_blogs()
    {
        $this->hasMany(Blog::class, 'checker_id', 'id');
    }


    /**
     * gets all writers all subscribers
     */
    public function subscriber()
    {
        $this->hasMany(Subscriber::class);
    }


    /**
     * gets all comments from comments table
     */
    public function comments()
    {
        $this->hasMany(Comment::class, 'user_id', 'id');
    }

}
