<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	   /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patient_orderlist';

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
    protected $fillable = ['text','file','patient_id','doctor_id',];

	
   
} 