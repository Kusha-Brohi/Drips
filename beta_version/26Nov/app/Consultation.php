<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'consultation';

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
    protected $fillable = ['payment_status','notification','patient_id','doctor_id','problem', 'Report', 'booking_type', 'date', 'timing','DOB', 'name', 'age', 'gender', 'weight','height','bmi','images'];

  
}
