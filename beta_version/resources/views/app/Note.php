<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notes';

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
    protected $fillable = ['doctor_id','patient_id','Appearance', 'objective','GENERAL_APPEARANCE','HEAD_AND_NECK','RESPIRATORY_CHEST','CARDIOVASCULAR','ABDOMEN','GENITOURINARY','MUSCULOSKELETAL','NEURO','HEME_LYMPH','SKIN_INTEGUMENARY','PSYCH'];

   
    
}
