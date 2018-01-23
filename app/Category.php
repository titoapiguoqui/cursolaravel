<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;

    // No hace falta, está por defecto
    protected $connection = 'mysql';

    // Tabla en la base de datos (por convención en inglés no habría que ponerlo)
    protected $table = 'categories';

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
     * Relationship between Category and Book
     *
     * @var function 
     */

    public function books() {
    	return $this->hasMany(Book::class, 'category_id', 'id');
    }
}
