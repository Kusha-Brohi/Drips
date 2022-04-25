<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patients';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    
    protected $fillable = ['blood_type','user_id','fname','lname','DOB','Gender','material_status','phone','email','Weight','Lbs','height','Bmi','Address','employment_status','family_doc','allergies','medical_condition','medical_condition2','Surgeries1','Surgeries2','Surgeries3','Surgeries4','Current_medication1','Current_medication1','family_medical_condition','do_you_smoke','Quantity','do_u_tobacco','do_u_Alcohol','do_u_marijuana','card','card_num','card_holder','validation','Security_code','pic','social_history','past_medical_history','past_condition2','past_condition3','past_condition4','mother_medical_condition','siblings_medical_condition','are_you_employed','job_title','employee_name','daily_pain','impairment','dialysis','cancer','transplant','amputation','psychiatric','insulin','heart','validation_year'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}