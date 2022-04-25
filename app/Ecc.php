<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'eccs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Ecc_price'];

    
}
