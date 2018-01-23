<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
	use SoftDeletes;

    // No hace falta, está por defecto
    protected $connection = 'mysql';

    // Tabla en la base de datos (por convención en inglés no habría que ponerlo)
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'image' 'description', 'category_id', 'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Relationship between Book and Category
     *
     * @var function 
     */

    public function category() {
        return $this->belognsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Relationship between Book and User
     *
     * @var function 
     */

    public function user() {
        return $this->belognsTo(User::class, 'user_id', 'id');
    }

}
