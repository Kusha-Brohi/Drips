<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Patient;
use Illuminate\Http\Request;
use Image;
use File;
use Mail;
use App\Consultation;
use Illuminate\Support\Facades\Validator;
use Session;
use App\imagetable;
class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

         $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();
             
        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first(); 
         $portal_logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','portal_logo')
                     ->first();
        
        View()->share('logo',$logo);
        View()->share('portal_logo',$portal_logo);
        View()->share('favicon',$favicon);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('patient','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 300;

            if (!empty($keyword)) {
                $patient = DB::table('patients')->where('Is_deleted',0)->orWhere('customer_status',4)
                ->paginate($perPage);
            } else {
                $patient =DB::table('patients')->where('Is_deleted',0)->where('customer_status',4)->paginate($perPage);
            }

            return view('admin.patient.index', compact('patient'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
			$model = str_slug('User','-');
            return view('admin.patient.create');

    }
	
	
	 public function AddPatient()
    {   
          $model = str_slug('User','-');
      
            return view('admin.patient.add_patient');

    }

    public function RegisterPatient(Request $request){
           
       $this->validate($request, [
            'name' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'password' => 'required',
          
        ]);
            
        $email_validation = DB::table('users')->where('email',$request->email)->first();
        
        
        //dd($email_validation);
            ///create user ////
        $newPatient = new User;
        $newPatient->name = $request->name;
        $newPatient->lname = $request->lname;
        $newPatient->customer_status = $request->customer_status;
        $newPatient->status_Incomplete = $request->status_Incomplete;
        if($email_validation != '' ){
            return redirect('admin/add_patient')->with('flash_message', 'email already exists');
            
        
        }else{
            
             $newPatient->email = $request->email;
        }
        
 
       
        $newPatient->password = Hash::make($request['password']);
    
      
              
        $newPatient->save();
      /*       dd($newPatient);*/
        
        
         ////update profile
        $newPatientData = new patient;
        $newPatientData->customer_status = $request->customer_status;
        $newPatientData->user_id = $newPatient->id;
        $newPatientData->fname = $newPatient->name;
        $newPatientData->email = $newPatient->email;
        $newPatientData->lname = $newPatient->lname;
            //dd($newPatientData);
        $newPatientData->save();
                
                        $patient_email = array();
                        $patient_email['name'] = $newPatientData->fname;
                        $patient_email['email'] = $newPatientData->email;
                        $patient_email['id'] = $newPatientData->user_id;
                        $patient_email['password'] = $request->password;
                      
                        //   dd($patient_email);
                        
                            //For Admin Add new Patient Email Method 
  Mail::send('mailingtemplates.PatientNotification', ['patient_email' => $patient_email], function ($m) use ($patient_email) {
                                $m->from('daltondeveloper.testing@gmail.com', 'Drips');
                                $m->to($patient_email['email'],'drip')->subject('Registration Process');
                        });
            
            return redirect('admin/add_patient')->with('message', 'Patient added!');
        /*}*/
        return response(view('403'), 403);


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('patient','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $patient = new patient($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $patient_path = 'uploads/patients/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($patient_path) . DIRECTORY_SEPARATOR. $profileImage);

                $patient->image = $patient_path.$profileImage;
            }
            
            $patient->save();

            return redirect('admin/patient')->with('message', 'Patient added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('patient','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $patient = Patient::findOrFail($id);
            return view('admin.patient.show', compact('patient'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function editPatient($id)
    {   
        $model = str_slug('patient','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $patient = Patient::findOrFail($id);
          //dd($patient);
            return view('admin.patient.edit', compact('patient'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
  public function update(Request $request, $id)
    {
             $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'DOB' => 'required',
            'Gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'Address' => 'required',
           
        ]);
            
         $requestData['user_id'] = $request['user_id'];
            $requestData['email'] = $request['email'];
            //dd($re['est->user_id);
            $requestData['fname'] = $request['fname'];

           $requestData['lname'] = $request['lname'];
            $requestData['DOB'] = $request['DOB'];
          
            $requestData['MM']= $request['MM'];
            $requestData['YYY'] = $request['YYY'];
            $requestData['Gender'] = $request['Gender'];
           /* $patient['Weight'] = $request['Weight'];*/
            $requestData['material_status'] = $request['material_status'];
            $requestData['phone'] = $request['phone'];
            $requestData['Weight'] = $request['Weight'];
            $requestData['Lbs'] = $request['Lbs'];
            $requestData['height'] = $request['height'];
            $requestData['Bmi']= $request['Bmi'];
            $requestData['Address'] = $request['Address'];
            $requestData['employment_status']= $request['employment_status'];
         
           
            $requestData['allergies'] = json_encode($request['allergies']);
         $requestData['Is_allergies']= $request['Is_allergies'];
            $requestData['Surgeries1']= json_encode($request['Surgeries1']);
    
            $requestData['Current_medication1'] = json_encode($request['Current_medication1']);
                 
            $requestData['family_medical_condition'] = json_encode($request['family_medical_condition']);
            
            $requestData['do_you_smoke'] = $request['do_you_smoke'];
            $requestData['do_u_tobacco'] = $request['do_u_tobacco'];
            $requestData['do_u_Alcohol'] = $request['do_u_Alcohol'];
            $requestData['do_u_marijuana']= $request['do_u_marijuana'];
            $requestData['card']= $request['card'];
            $requestData['card_num'] = $request['card_num']; 
            $requestData['card_holder'] = $request['card_holder']; 
            $requestData['validation'] = $request['validation']; 
            $requestData['Security_code'] = $request['Security_code']; 
            $requestData['customer_status'] = $request['customer_status'];
            $requestData['social_history'] = $request['social_history'];
            $requestData['past_medical_history']  = json_encode($request['past_medical_history']);
                
            $requestData['are_you_employed']   = $request['are_you_employed'];
            $requestData['job_title'] = $request['job_title'];
            $requestData['employee_name']   = $request['employee_name'];
            $requestData['blood_type']= $request['blood_type'];
            $requestData['daily_pain']  = $request['daily_pain'];
            $requestData['impairment']   = $request['impairment'];
            $requestData['visual']   = $request['visual'];
            $requestData['cancer'] = $request['cancer'];
            $requestData['transplant']  = $request['transplant'];
            $requestData['amputation']  = $request['amputation'];
            $requestData['heart']  = $request['heart'];
            $requestData['insulin']  = $request['insulin'];
            $requestData['dialysis']   = $request['dialysis'];
            $requestData['psychiatric'] = $request['psychiatric'];
            $requestData['validation_year']  = $request['validation_year'];
                
            // New Code
            if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $folderName = '/public/uploads/patient/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('pic')->getClientOriginalName();
            $fileExt = $request->file('pic')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $requestData['pic'] = '/public/uploads/patient/'.$safeName;
            }
            


/*DB::table('patients')
->where('id', $id)
 ->update(
 $requestData
 );*/
            $patient = patient::findOrFail($id);
             $patient->update($requestData);
           
     ////*update data into user table*////

      $email_validation = DB::table('users')->where('email',$request->email)->where('id' ,'!=' ,$request->user_id)->first();
      /*   dd($email_validation);*/
      if($email_validation != ''){
        return back()->with('flash_message', 'email address already exists');
        }else{
        $User_patient['email'] = $patient['email'];
        $User_patient['name'] = $patient['fname'];
         
        }
       DB::table('users')
     ->where('id', $request->user_id)
     ->update(
     $User_patient
      );
             return back()->with('message', 'Patient updated!');
        }

          ////*update data into Patient table*////
       


           //  return back()->with('message', 'Patient updated!');
  


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('patient','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
          
          //  Patient::destroy($id);
            $patient_list = DB::table('patients')->where('id',$id)->first();
            $patient = DB::table('patients')->where('id',$id)->update(['Is_deleted'=> 1]);
            $patient = DB::table('users')->where('id',$patient_list->user_id)->update(['Is_deleted' => 1]);
           
            return redirect('admin/patient')->with('message', 'Patient deleted!');
        }
        return response(view('403'), 403);

    }


    public function BlockUser($id)
    {
        //dd($id);
        $patient_list = DB::table('patients')->where('id',$id)->first();
        $block_user = DB::table('users')->where('id',$patient_list->user_id)->update(['customer_status' => 0]);
       // dd($block_user);
			
			            $blocked_email = array();
                        $blocked_email['name'] = $patient_list->fname;
                        $blocked_email['email'] = $patient_list->email;
                        $blocked_email['id'] = $patient_list->user_id;
					
                            //For Admin Patient Blocked Email Method 
  Mail::send('mailingtemplates.AccountBlocked', ['blocked_email' => $blocked_email], function ($m) use ($blocked_email) {
                                $m->from('daltondeveloper.testing@gmail.com', 'Drips');
                                $m->to($blocked_email['email'],'drip')->subject('Portal Blocked');
                        });
		
         return redirect('admin/patient')->with('message', 'Patient Blocked!');

    } 
    public function UnblockUser($id)
    {
        //dd($id);

        $patient_list = DB::table('patients')->where('id',$id)->first();
        $block_user = DB::table('users')->where('id',$patient_list->user_id)->where('customer_status',0)->update(['customer_status' => 4]);
       // dd($block_user);
		
		
			  $blocked_email = array();
                        $unblocked_email['name'] = $patient_list->fname;
                        $unblocked_email['email'] = $patient_list->email;
                        $unblocked_email['id'] = $patient_list->user_id;
					
                            //For Admin Patient Blocked Email Method 
  Mail::send('mailingtemplates.AccountUnBlocked', ['unblocked_email' => $unblocked_email], function ($m) use ($unblocked_email) {
                                $m->from('daltondeveloper.testing@gmail.com', 'Drips');
                                $m->to($unblocked_email['email'],'drip')->subject('Portal UnBlocked');
                        });
		
	   
	   
         return redirect('admin/patient')->with('message', 'Patient UnBlock successfully!');

    }





    public function MakeAppointment($id)
    {   
      $patient_id = $id;
      $appointment_Patient = DB::table('patients')->where('id',$patient_id)->where('customer_status' , 4)->first();
      $patient_booking_id = $appointment_Patient->user_id;
      return view('admin/patient/MakeAppointment',compact('patient_booking_id'));

    }




    public function AppointmentBooking(Request $request){
        
    $this->validate($request, [

    ]);


      $consultation = array();
      $consultation['patient_id'] = $request->patient_id;
      $consultation['doctor_id'] = $request->doctor_id;
      $consultation['name'] = $request->name;
      $consultation['DOB'] = $request->DOB;
      //dd($consultation['DOB']);
      $consultation['age'] = $request->age;
      $consultation['gender'] = $request->gender;
      $consultation['weight'] = $request->weight;
      $consultation['lbs'] = $request->lbs;
      $consultation['height'] = $request->height;
      $consultation['bmi'] = $request->bmi;
      $consultation['booking_type'] = $request->booking_type;
      $consultation['date'] =$request->date;

      $test=implode(",",$request->input('problem'));
      $consultation['problem'] = rtrim($test,",");

      //$test=$request->problem;
  
      $consultation['timing'] = $request->timing;
          $file = $request->file('images');
          $file = $request->file('Report');
      
    if ($request->hasFile('Report')) {

      $file = $request->file('Report');

                //make sure yo have image folder inside your public
                $resume_path = 'uploads/Reports/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

               //$request->file->move(public_path($resume_path) . DIRECTORY_SEPARATOR. $profileImage);
               $request->Report->move(public_path('uploads/Reports/'), $profileImage);

                $consultation['Report'] = $resume_path.$profileImage;

        
  }
              
          if(! is_null(request('images'))) {
                
                $photos=request()->file('images');
               
                foreach ($photos as $key=> $photo) {
                    $destinationPath = 'uploads/Reports/';
                
                    $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
                    //dd($photo,$filename);
                   Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);
         
                    $consultation['images'][$key] = $destinationPath.$filename;
   
                }
        
            }
            
             $keyword = $test;
             if ($keyword == "") {
          
        return back()->with('flash_message', 'Please select problem');


             }else{


              $listing = DB::table('profiles');
          if(isset($keyword) AND count($keyword) > 0) {
            $keyword = explode(",", rtrim($keyword,","));
                $ss = "(";
                foreach($keyword as $key=>$value) {
                  if($value != ''){
                    if($key != 0) {
                        $ss .=    ' OR ';
                    }
            
                    $ss .= "(expertise LIKE '%$value%')";
                }
            }
          
                $ss .= " )";
            }
  
            $listing->whereRaw($ss);
  

          
      $Result = $listing->where('customer_status','=','3')->get();

     
        Session::put('consultation',$consultation);
        Session::flash('message', 'Please Choose a Doctor'); 
        Session::flash('alert-class', 'alert-success'); 

         return view('admin/patient/MakeAppointment',compact('listing','keyword','Result','photos'));  


             }
          


              
    }


    public function searchDoctor(Request $request){
      
      $consultation = Session::get('consultation');
      $keyword = $request->expertise;
    
    
      if($request->expertise != '' && $request->gender != '' && $request->language !=''){   
      $Result = DB::table('profiles')
             ->where('Speciality','=',$keyword)
      ->where('language', $request->language)
             ->where('gender', $request->gender)
      ->where('customer_status','=','3')->get();  
        
      }
      
      elseif($request->expertise != '' ){
      $Result = DB::table('profiles')
            ->where('Speciality','=',$keyword)
      ->where('customer_status','=','3')->get();    
      }
      
      elseif($request->gender != ''){
      $Result = DB::table('profiles')
            ->where('gender', $request->gender)
      ->where('customer_status','=','3')->get();
      }
      
      elseif($request->language != ''){
      $Result = DB::table('profiles')
            ->where('language', $request->language)
      ->where('customer_status','=','3')->get();  
      }
      
    
         $patient_id = DB::table('patients')->where('user_id',$consultation['patient_id'])->first();
       
             if(count($Result) == '')
            {
            Session::flash('flash_message', 'No Match Found'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('admin/patient/user/'.$patient_id->id);
            }

            else
            { 
               
               return view('admin/patient/MakeAppointment',compact('Result'));
            }
       
       
           
    }

      public function SubmitAppointmentcard(Request $request){
       // dd($request->patient_id);
   $consultation = Session::get('consultation');
   $consultation['doctor_id'] = $request->doctor_id;
   Session::put('consultation',$consultation);
   $consultation = new consultation($consultation);
    $consultation->save();

                foreach ($consultation->images as $key => $value) {
                    DB::table('product_imagess')->insert(
                        ['image' => $value, 'consultation_id' => $consultation->id]
                    );   
                }
                    


                    ///Appointment booking email///
        $consultData = DB::table('consultation')->where('id', $consultation->id)->first();

        $doctorData  =DB::table('users')->where('id',$consultData->doctor_id)->first();

        $speciality  =DB::table('profiles')->where('user_id',$doctorData->id)->first();
 
        $doctorSpeciality =DB::table('specialities')->where('id',$speciality->Speciality)->first();

        $patientData  =DB::table('users')->where('id',$consultData->patient_id)->first();
    

                        $emaildata = array();
                    
                        $emaildata['name'] = $doctorData->name;
                        $emaildata['email'] = $doctorData->email;
                        $emaildata['consult'] = $consultData->id;
                        $emaildata['patientname'] = $consultData->name;  
                        $emaildata['patientemail'] = $patientData->email;
                        $emaildata['speciality_0f_Doc'] = $doctorSpeciality->name;
                        $emaildata['booking_type'] = $consultData->booking_type;
                        $emaildata['date'] =   date('j F, Y', strtotime($consultData->date));  
                        $emaildata['timing'] = $emaildata['timing'] = date('H:i:s A', strtotime($consultData->timing));
                        $url = url('/ECC_card/'.$consultData->id."?type=1"); 
                      //dd($emaildata);
                      
                                    /*TO Doctor */
                      Mail::send('mailingtemplates.consultationRequest', ['emaildata' => $emaildata,'url' =>$url], function ($m) use ($emaildata) {
                           $m->from('daltondeveloper.testing@gmail.com', 'DRIPS');
                           $m->to($emaildata['email'],'DRIPS')->subject('DRIPS');
                      });
					  
						/*To Patient*/
					     Mail::send('mailingtemplates.consultationConfirmation', ['emaildata' => $emaildata,'url' =>$url], function ($m) use ($emaildata) {
                           $m->from('daltondeveloper.testing@gmail.com', 'DRIPS');
                           $m->to($emaildata['patientemail'],'DRIPS')->subject('DRIPS');
                      });
					  



                    Session::forget('consultation');
                    Session::flash('message', 'You have Successfully Booked an Appointment!'); 
                    Session::flash('alert-class', 'alert-success');
                    return redirect('admin/patient/user/'.$request->patient_id);
                
      
    }
    

}
