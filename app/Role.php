<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
	use SoftDeletes;

    // No hace falta, está por defecto
    protected $connection = 'mysql';

    // Tabla en la base de datos (por convención en inglés no habría que ponerlo)
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relationship between Role and User
     *
     * @var function 
     */

    public function users() {
    	return $this->hasMany(User::class, 'role_id', 'id');
    }
}
