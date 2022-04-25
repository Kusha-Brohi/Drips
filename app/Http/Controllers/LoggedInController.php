<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\inquiry;
use App\Profile;
use App\Patient;
use App\Consultation;
use App\newsletter;
use App\Program;
use App\imagetable;
use App\Banner;
use DB;
use Image;
use View;
use File;
use App\orders_products;
use App\orders;
use Auth;
use Session;
use App\Http\Traits\HelperTrait;



class LoggedInController extends Controller
{	
	use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 // use Helper;
	 
    public function __construct()
    {

		// $this->middleware('guest');
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
		View()->share('favicon',$favicon);
		View()->share('portal_logo',$portal_logo);
        //View()->share('config',$config);
    }

	
	public function orders()
    {
		
		$orders = orders::where('orders.user_id', Auth::user()->id)
				->orderBy('orders.id', 'desc')
				->get();
		return view('account.orders',['ORDERS'=>$orders]); 
		
	}
	

	public function account()
    {

		$orders = orders::where('orders.user_id', Auth::user()->id)
				->orderBy('orders.id', 'desc')
				->get();
		return view('account.index',['ORDERS'=>$orders]); 
		
	}


		public function update_profile(Request $request) {
		
		$user = DB::table('profiles')->where('id', Auth::user()->id)->first();
		
		$validateArr = array();
		$messageArr = array();
		$insertArr = array();
		$validateArr = [ 

			'uname' => 'required',
			'email' => array(),
			
		 ];
		 
		 if($user->email != $_POST['email']) {
			$validateArr['email'] = 'required|unique:users,email,NULL,id';
		 }

		if(trim($_POST['password']) != "") {
		
			$validateArr['password'] = 'required|min:6|confirmed'; 
            $validateArr['password_confirmation'] = 'required|min:6'; 
		}
		
		$this->validate($request,$validateArr,$messageArr);
		
		$insertArr['name'] = $_POST['uname'];	
		$insertArr['email'] = $_POST['email'];
	
		if(trim($_POST['password']) != "") {
				$insertArr['password'] = Hash::make($_POST['password']);
		}
			
		DB::table('users')
		->where('id', Auth::user()->id)
		->update(
					$insertArr
				);
					
					
		Session::flash('message', 'Your Profile Settings has been changed'); 
		Session::flash('alert-class', 'alert-success'); 
		return back();			
		
	}


	public function uploadPicture(Request $request) {	

		$user = DB::table('profiles')->where('id', Auth::user()->id)->first();
	
        if ($file = $request->file('pic')) {
            $extension = $file->extension()?: 'jpg|png';
            $destinationPath = public_path() . '/storage/uploads/users/';
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $safeName);
            //delete old pic if exists
            if (File::exists($destinationPath . $user->pic)) {
                File::delete($destinationPath . $user->pic);
            }
            //save new file path into db
            $profile->pic = $safeName;
        }

			$insertArr['pic'] = $safeName;

			DB::table('profiles')
			->where('id', Auth::user()->id)
			->update(
						$insertArr
					);

		Session::flash('message', 'Your Profile has been changed'); 
		Session::flash('alert-class', 'alert-success'); 
		return back();			

	}
    public function updateAccount(Request $request) {

$user = DB::table('users')->where('id', Auth::user()->id)->first();

$insertArr['name'] = $_POST['name'];
 $insertArr['email'] = $_POST['email'];

 $password = $_POST['password'];
 $confirmpass = $_POST['password_confirmation'];
  if($password == $confirmpass ){
 if(trim($_POST['password']) != "") {
 $insertArr['password'] = Hash::make($_POST['password']);
 } 
 DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $insertArr
 );

Session::flash('message', 'Your password settings has been changed'); 
Session::flash('alert-class', 'alert-success'); 
return back();
 }
 else{
  
    Session::flash('flash_message', 'Password do not match'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
 
 }
  
}
	public function accountDetail()
    {
		$orders = orders::where('orders.user_id', Auth::user()->id)
						->orderBy('orders.id', 'desc')
						->get();
		
		return view('account.account',['ORDERS'=>$orders]); 
		
	}
	
	public function invoice($id)
    {
		$order_id = $id;
		$order = orders::where('id',$order_id)->first();
		$order_products = orders_products::where('orders_id',$order_id)->get();
		
		return view('account.invoice')->with('title','Invoice #'.$order_id)->with(compact('order','order_products'))->with('order_id',$order_id);; 
	}


	public function friends()
    {
		return view('account.friends'); 
		
	}

	public function upload()
    {
		return view('account.upload'); 
		
	}

	public function password()
    {
		return view('account.password'); 
		
	}
	
public function submitProfile(Request $request){
			//dd($request);
		if (isset($request->chngepassword)) {
			$insertArr['speciality'] = $request->Speciality;
        $insertArr['expertise'] = $request->expertise;
		}else{
	$specialities_expertise = DB::table('specialities')->where('id',$request->expertise)->first();
      // dd($specialities_expertise);
		$insertArr['speciality'] = $specialities_expertise->id;
        $insertArr['expertise'] = $specialities_expertise->symtom;
      }
		$insertArr['name'] = $_POST['name'];
		$insertArr['email'] = $_POST['email'];
		$insertArr['MDCN'] = $_POST['MDCN'];
		//$insertArr['Speciality'] = $_POST['Speciality'];
		$insertArr['DOB'] = $_POST['DOB'];
		$insertArr['phone'] = $_POST['phone'];
		$insertArr['gender'] = $_POST['gender'];
		$insertArr['language'] = $_POST['language'];
		$insertArr['residency'] = $_POST['residency'];
		//dd($_POST['address']);
		/*$insertArr['expertise'] = $_POST['expertise'];*/
		$insertArr['price'] = $_POST['price'];
		
	
		if ($request->hasFile('pic')) {
            
            $profile = DB::table('profiles')->where('user_id', Auth::user()->id)->first();
            $image_path = public_path($profile->pic); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('pic');
            $fileNameExt = $request->file('pic')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('pic')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/doctors/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $insertArr['pic'] = 'uploads/doctors/'.$fileNameToStore;               
        }

  
			DB::table('profiles')
			->where('user_id', Auth::user()->id)
			->update(
				$insertArr
			);

		//dd($insertArr);

 $userData['email'] = $_POST['email'];
 $userData['MDCN'] = $_POST['MDCN'];
 $password = $_POST['password'];
 $confirmpass = $_POST['password_confirmation'];
  if($password == $confirmpass ){
 if(trim($_POST['password']) != "") {
 $userData['password'] = Hash::make($_POST['password']);
 } 
 
 if (isset($request->chngepassword)) {
 $password_validation = DB::table('users')->where('id',Auth::user()->id)->first();
 	$DB_password =$password_validation->password;

  	if (password_verify($password,$DB_password)) {
   return back()->with('flash_message', 'password already exists');
} else {
	$userData['password_Is_secure'] ='Yes';
	DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $userData
 );
}
}
 DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $userData
 );

Session::flash('message', 'Your settings has been changed'); 
Session::flash('alert-class', 'alert-success'); 
return back();
 }
 else{
  
    Session::flash('flash_message', 'Password do not match'); 
Session::flash('alert-class', 'alert-danger'); 
return back();
 
 }


/*		$userData['email'] = $_POST['email'];
		$userData['password_Is_secure'] = 'Yes';
         $password = $_POST['password'];
 		$confirmpass = $_POST['password_confirmation'];
 		
  if($password == $confirmpass ){
 if(trim($_POST['password']) != "") {
 $userData['password'] = Hash::make($_POST['password']);
 } 
 DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $userData
 );
}*/

			


		}

		public function PatientDirectory(Request $request){
			//dd($request);
		$user = DB::table('users')->where('id', Auth::user()->id)->first();
			$patientArr['lname'] = $_POST['lname'];
			$patientArr['DOB'] = $_POST['DOB'];
			$patientArr['allergies'] = $_POST['allergies'];
			$patientArr['email'] = $_POST['email'];
			$patientArr['phone'] = $_POST['phone'];
			$patientArr['Address'] = $_POST['Address'];
			$patientArr['Gender'] = $_POST['Gender'];
			
		if ($request->hasFile('pic')) {
            $patient = DB::table('patients')->where('user_id', Auth::user()->id)->first();

            $image_path = public_path($patient->pic); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('pic');

            $fileNameExt = $request->file('pic')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('pic')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/patient/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $patientArr['pic'] = 'uploads/patient/'.$fileNameToStore;               
        }

			
			DB::table('patients')
			->where('user_id', Auth::user()->id)
			->update(
				$patientArr
			);

		$userData['email'] = $_POST['email'];
		$userData['lname'] = $_POST['lname'];
         $password = $_POST['password'];
 		$confirmpass = $_POST['password_confirmation'];
  if($password == $confirmpass ){
 if(trim($_POST['password']) != "") {
 $userData['password'] = Hash::make($_POST['password']);
 } 
 DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $userData
 );
}

			Session::flash('message', 'Your personal settings has been updated!');
			Session::flash('alert-class', 'alert-success');
			return back();
		}
		

		public function PasswordChange(Request $request){

		$userData['email'] = $_POST['email'];
         $password = $_POST['password'];
 		$confirmpass = $_POST['password_confirmation'];
  if($password == $confirmpass ){
 if(trim($_POST['password']) != "") {
 $userData['password'] = Hash::make($_POST['password']);
 } 
 DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $userData
 );
}

			Session::flash('message', 'Your personal settings has been updated!');
			Session::flash('alert-class', 'alert-success');
			return back();
		}

public function ConsultationRequest(Request $request){
				
				
		$validateArr = array();
		$messageArr = array();
		
		$validateArr = [ 

			'timing' => 'required',
			'start_date' => 'required|date',
			'date' =>'required|date|after_or_equal:start_date',
			'problem' =>'required'
		 ];

	
			$this->validate($request,$validateArr,$messageArr);
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

				//make sure yo have image folder inside your public
             /*   $destination_path = '/uploads/Reports/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

                $consultation['images'] = $destination_path.$profileImage;*/



                            // $folderName = '/uploads/Reports/';
            // $destinationPath = public_path() . $folderName;
            // $fileName = $request->file('Report')->getClientOriginalName();
            // $fileExt = $request->file('Report')->getClientOriginalExtension();
            // $safeName = $fileName.'_'.time().'.'.$fileExt;
            // $file->move($destinationPath, $safeName);
            // $consultation['Report'] = 'uploads/Reports/'.$safeName;
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
       //   dd('test');
	    Session::put('consultation',$consultation);
        return redirect('patient-dashboard/consultation')->with('flash_message', 'Please select problem');


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
                    //$ss .= "(listing_ads.title LIKE '%$value%') OR (listing_ads.description LIKE '%$value%')";
                    $ss .= "(expertise LIKE '%$value%')";
                }
            }
          
                $ss .= " )";
            }
          //  dd($ss);
            $listing->whereRaw($ss);
      		//dd($listing);
 
			$Result = $listing->where('customer_status','=','3')->get();
			//dd($Result);
		
             Session::put('consultation',$consultation);
         			//dd($consultation);
               			
        Session::flash('message', 'Please Choose a Doctor'); 
        Session::flash('alert-class', 'alert-success'); 
         return view('patient-dashboard.consultation',compact('listing','keyword','Result','photos','consultation'));	


             }
      		

        			
		}


		public function selectDoctor(Request $request){
			//dd($request);
			
			$consultation = Session::get('consultation');
			//dd($consultation);
			//$keyword=$consultation['problem'];
			$keyword = $request->expertise;
			//dd($keyword);
		
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
			
			elseif($request->expertise == null && $request->gender == null && $request->language == null){	
					
			$Result = DB::table('profiles') 
			->where('customer_status','=','3')->get();
				
				
			}
			
			
			 // $patient_id = DB::table('patients')->where('user_id',$consultation['patient_id'])->first();
		$patient_id = DB::table('patients')->where('id',$request['pat_id'])->first();
		
			 $searchlisting  = array();
            $searchlisting['expertise'] = $request->expertise;
            $searchlisting['gender'] = $request->gender;
            $searchlisting['language'] = $request->language;
          /*  dd($searchlisting);*/
                Session::put('searchlisting',$searchlisting);
            if ($consultation == null)
            {
				Session::flash('flash_message', 'Please Book Your Appointment'); 
            Session::flash('alert-class', 'alert-success'); 
              return redirect('patient-dashboard/consultation');
				
          
            }
			elseif(count($Result) == '')			  {
             Session::flash('flash_message', 'No Match Found'); 
            Session::flash('alert-class', 'alert-success'); 
			 Session::forget('searchlisting');
           return redirect('patient-dashboard/consultation');
            }
            else
            { 	    Session::flash('message', 'Match Found Successfully'); 
                    Session::flash('alert-class', 'alert-success'); 
				
                return view('patient-dashboard.consultation',compact('Result' ,'keyword','searchlisting','consultation'));
             //  return view('admin/patient/MakeAppointment',compact('Result','keyword','searchlisting'));
            }
			
			
			
		
          //  dd($Result);
            // if(count($Result) == '')
         	 // {
       		//	Session::flash('flash_message', 'No Match Found'); 
        	//	Session::flash('alert-class', 'alert-success'); 
        	//	return redirect('patient-dashboard/consultation');
         	  //}else
         	 // {
         	 // 	 return view('patient-dashboard.consultation',compact('Result'));
         	 // }
       
           
		}

		
		/*public function ConsultationRequest(Request $request){

			$consultation = new consultation;
			$consultation->patient_id = $request->patient_id;
			$consultation->doctor_id = $request->doctor_id;
			$consultation->name = $request->name;
			$consultation->age = $request->age;
			$consultation->gender = $request->gender;
			$consultation->weight = $request->weight;
			$consultation->lbs = $request->lbs;
			$consultation->height = $request->height;
			$consultation->bmi = $request->bmi;
			$consultation->booking_type = $request->booking_type;
			$consultation->date = $request->date;
			$test=implode(",",$request->input('problem'));
			$consultation->problem = $test;
			$consultation->timing = $request->timing;
			$file = $request->file('Report');
			if ($request->hasFile('Report')) {
            $folderName = '/uploads/Reports/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('Report')->getClientOriginalName();
            $fileExt = $request->file('Report')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $consultation['Report'] = 'uploads/Reports/'.$safeName;
        }
            $consultation->save();
          
            $keyword = $test;
            
 			
             $listing = DB::table('profiles')
               ->where('expertise', 'like', '%' . $keyword. '%' )
               ->where('customer_status','=','3')->get();

       
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        			return view('patient-dashboard.consultation',compact('listing','keyword'));
		}
*/

		public function RequestStatus($id, $con) {
		//dd($id,$con);
		$user= $id;
	
			if($con == "0"){
		$user = DB::table('consultation')->where('id', $id)->update(['Is_accept' => '0']);  
		
			}elseif($con == "1"){	
			$user = DB::table('consultation')->where('id', $id)->update(['Is_accept' => '1']); 
			
			}elseif($con == "2"){
				$user = DB::table('consultation')->where('id', $id)->update(['Is_accept' => '2']); 
				
			}
		
					///email code/////
			/*if($con == "rejected"){
						// Email code starts here
						 $user = DB::table('users')->where('id', $id)->first();
						 
        				$data = array();
						
                		$data['name'] = $user->name;
                		
						$data['email'] = $user->email;
							
					
                		
                            /*For Admin Order Email Method */
                	/*	Mail::send('mailingtemplates.rejected', ['data' => $data], function ($m) use ($data) {
                                $m->from('rosedev200@gmail.com', 'Drips');
                                $m->to($data['email'],'Drips')->subject('Rejected');
                        });*/
        
                        // Email code ends here
	/*	}
		
		else{
			 $user = DB::table('users')->where('id', $id)->first();
						 
						// Email code starts here
						
        				$data = array();
                		$data['name'] = $user->name;
                		
						$data['email'] = $user->email;
						
                		
                            For Admin Order Email Method 
                		Mail::send('mailingtemplates.confirmation', ['data' => $data], function ($m) use ($data) {
                                $m->from('rosedev200@gmail.com', 'drips');
                                $m->to($data['email'],'drips')->subject('Approval');
                        });*/
        
                        // Email code ends here
		/*}*/
			
		Session::flash('message', 'Status Updated Successfully'); 
						Session::flash('alert-class', 'alert-success'); 
						return back();
	
	}

 public function destroyImage($id)
    {
      
	 	 	 DB::table('product_imagess')->delete($id);

            return back()->with('flash_message', 'Image deleted!');
       
     
    }



  public function submitPatientProfile(Request $request){
    		//dd($request);
   
            $patient['user_id'] = $request['user_id'];
            $patient['email'] = $request['email'];
            //dd($re['est->user_id);
            $patient['fname'] = $request['fname'];

           $patient['lname'] = $request['lname'];
            $patient['DOB'] = $request['DOB'];
          
            $patient['MM']= $request['MM'];
            $patient['YYY'] = $request['YYY'];
            $patient['Gender'] = $request['Gender'];
           /* $patient['Weight'] = $request['Weight'];*/
            $patient['material_status'] = $request['material_status'];
            $patient['phone'] = $request['phone'];
            $patient['Weight'] = $request['Weight'];
            $patient['Lbs'] = $request['Lbs'];
            $patient['height'] = $request['height'];
            $patient['Bmi']= $request['Bmi'];
            $patient['Address'] = $request['Address'];
            $patient['employment_status']= $request['employment_status'];
         
           
            $patient['allergies'] = json_encode($request['allergies']);
         $patient['Is_allergies']= $request['Is_allergies'];
            $patient['Surgeries1']= json_encode($request['Surgeries1']);
    
            $patient['Current_medication1'] = json_encode($request['Current_medication1']);
       			 
            $patient['family_medical_condition'] = json_encode($request['family_medical_condition']);
            
            $patient['do_you_smoke'] = $request['do_you_smoke'];
            $patient['do_u_tobacco'] = $request['do_u_tobacco'];
            $patient['do_u_Alcohol'] = $request['do_u_Alcohol'];
            $patient['do_u_marijuana']= $request['do_u_marijuana'];
            $patient['card']= $request['card'];
            $patient['card_num'] = $request['card_num']; 
            $patient['card_holder'] = $request['card_holder']; 
            $patient['validation'] = $request['validation']; 
            $patient['Security_code'] = $request['Security_code']; 
            $patient['customer_status'] = $request['customer_status'];
            $patient['social_history'] = $request['social_history'];
    		$patient['past_medical_history']  = json_encode($request['past_medical_history']);
       			
            $patient['are_you_employed']   = $request['are_you_employed'];
            $patient['job_title'] = $request['job_title'];
            $patient['employee_name']   = $request['employee_name'];
            $patient['blood_type']= $request['blood_type'];
            $patient['daily_pain']  = $request['daily_pain'];
            $patient['impairment']   = $request['impairment'];
            $patient['visual']   = $request['visual'];
            $patient['cancer'] = $request['cancer'];
            $patient['transplant']  = $request['transplant'];
            $patient['amputation']  = $request['amputation'];
            $patient['heart']  = $request['heart'];
            $patient['insulin']  = $request['insulin'];
            $patient['dialysis']   = $request['dialysis'];
            $patient['psychiatric'] = $request['psychiatric'];
            $patient['validation_year']  = $request['validation_year'];
             	
            // New Code
            if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $folderName = '/public/uploads/patient/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('pic')->getClientOriginalName();
            $fileExt = $request->file('pic')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $patient['pic'] = '/public/uploads/patient/'.$safeName;
            }
            // New Code
         //	dd($patient);

           // $patient->save();

 //	dd($patient->user_id);
 DB::table('patients')
->where('user_id', Auth::user()->id)
 ->update(
 $patient
 );

       //Changing status in user table//// 
   //   $patient->id = $user->id;
 $userData['status_Incomplete'] = 'No';
  $userData['name'] = $request['name'];
 $userData['email'] = $request['email'];
if($patient['user_id']  == $request['user_id']){
 DB::table('users')
->where('id', Auth::user()->id)
 ->update(
 $userData
 );
}
	
		Session::flash('message', 'You have completed the registration process'); 
        Session::flash('alert-class', 'alert-success'); 
        			//return back();
        return redirect('patient-dashboard/steps/'.Auth::user()->id."?tabs=tab-step-130");

	}




	





}	
	
