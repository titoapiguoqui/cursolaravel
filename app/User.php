<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relationship between User and Role
     *
     * @var function 
     */

    public function role() {
        return $this->belognsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Relationship between User and Books
     *
     * @var function 
     */

    public function books() {
        return $this->hasMany(Book::class, 'user_id', 'id');
    }
}
