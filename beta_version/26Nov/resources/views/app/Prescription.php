<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prescription';

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
    protected $fillable = ['patient_id','doctor_id','consultation_id','medication_name', 'medication_name2', 'frequency', 'duration','file','Diagnosis'];

   
}
