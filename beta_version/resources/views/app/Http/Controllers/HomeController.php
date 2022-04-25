<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use Illuminate\Notifications\Notifiable;

class HomeController extends Controller
{   
    use HelperTrait;
    use Notifiable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;
     
    public function __construct()
    {
        //$this->middleware('auth');

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        
//         $data = array();
// $data['name'] = "Dalton Lambert";
// $data['email'] = "waqasahmed.it@gmail.com";
// $data['id'] = "12";


// //For Admin Order Email Method 
// Mail::send('mailingtemplates.steps', ['data' => $data], function ($m) use ($data) {
//     $m->from('dalton.developer@gmail.com', 'Drips');
//     $m->to($data['email'],'drip')->subject('Registration Process');
// });



// die();
        return redirect('https://dripsmedical.com/');die;
        $banner = DB::table('banners')->get();   
        
        $cms_home1 = DB::table('pages')->where('id', 1)->first();
        $cms_home2 = DB::table('pages')->where('id', 2)->first();
        $cms_home3 = DB::table('pages')->where('id', 3)->first();
        $cms_home4 = DB::table('pages')->where('id', 4)->first();
        $cms_home5 = DB::table('pages')->where('id', 5)->first();
        $cms_home6 = DB::table('pages')->where('id', 6)->first();

        $products = DB::table('products')->get()->take(10);

        return view('welcome', compact('banner', 'cms_home1','cms_home2','cms_home3','cms_home4','cms_home5','cms_home6'));
    }
    

    public function contactUsSubmit(Request $request)
    {
        $inquiry = new inquiry;
        $inquiry->inquiries_fname = $request->fname;
        $inquiry->inquiries_lname = $request->lname;
        $inquiry->inquiries_email = $request->email;
       // $inquiry->inquiries_phone = $request->phone;
        $inquiry->extra_content = $request->message;
        $inquiry->save();
            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }

    public function newsletterSubmit(Request $request)
    {
        $is_email = newsletter::where('newsletter_email',$request->email)->count();
        
        if($is_email == 0) {
            
        $inquiry = new newsletter;
        //$inquiry->newsletter_name = $request->name;
        $inquiry->newsletter_email = $request->email;
        //$inquiry->newsletter_message = $request->comment;
        $inquiry->save();
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/');
        
        } else {
            Session::flash('flash_message', 'email already exists'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
        
    }
    
    
        public function TestMail(){



        return view('mailView');

    }   
    public function TesteCC(){



        return view('TesteCC');

    }

    public function GtpayMerchant(){
      $data = DB::table('consultation')->where('patient_id',Auth::user()->id)->latest()->first();
      //dd($data);
      $doc_data = DB::table('profiles')->where('user_id',$data->doctor_id)->first();
    //   dd($doc_data);
      
        return view('gtpayMerchant',compact('data','doc_data'));

    }
    
    public function notification(){
       // require_once('notification.php');
        $data = $_GET;
	
        $test =  $data['txnref'];
      /* $test =  'AppointmentId:2023-251-302';*/
        $result = explode("-", $test);
        $appoint_id = trim($result[1],"AppointmentId:");
		//dd($appoint_id);
    DB::table('consultation')->where('id', $appoint_id)
    ->update(['notification' => $data ]); 
	$patient_id = trim($result[2],"AppointmentId:");
    ////Ecc payment status///////////
       $ecc_charges =  $data['txnref'];
        $ecc_result = explode("-", $ecc_charges);
		$pat_ecc = $ecc_result[1];
		//dd($pat_ecc);
		$ecc_ammount = DB::table('eccs')->first();
		$price_of_ecc = $ecc_ammount->Ecc_price * 100;
		//dd($data['amount']);
		//dd($pat_ecc);
	$patientData = DB::table('patients')->where('user_id',Auth::user()->id)->first();
		//dd($patientData);
	if($patientData->ecc_payment == 0){
		
			if($data['amount'] == $price_of_ecc) {  
			
			DB::table('patients')->where('user_id',Auth::user()->id)
			->update(['ecc_payment' => 1 ]);
			return redirect('patient-dashboard/steps/'.Auth::user()->id."?tabs=tab-step-131");	
        }
		}
		////Ecc payment status END///////////
	if($data['amount'] != $price_of_ecc ) {
    DB::table('patients')->where('user_id', Auth::user()->id)
    ->update(['ecc_payment' => 1 , 'first_appointment' => 1]);
        }
		
    DB::table('consultation')->where('id', $appoint_id)
    ->update(['tracking_id' => $appoint_id ]);
			
	if($data['desc'] == 'Approved by Financial Institution'){

    DB::table('consultation')->where('id', $appoint_id)
    ->update(['payment_status' => 'success' ]);
	
		///Appointment booking email///
		$consultData = DB::table('consultation')->where('id',$appoint_id)->first();

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
            $emaildata['txnref']  =  $data['txnref'];
            $url = url('/ECC_card/'.$consultData->id."?type=1"); 
                       // dd($emaildata['patientemail']);
                            
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
					  
					  
	
    return redirect('success');
	}

else
{
 DB::table('consultation')->where('id', $appoint_id)
    ->update(['payment_status' => 'fail' ]);
        return redirect('fail');
}



        
      return redirect('/');
        return view('notification');
    }

    public function Success(){

        return view('success');
    }    

    public function Fail(){
        
        return view('fail');
    }
   

    public function ajax_call_ecc_popup(Request $request)
    {
        //dd($request->consultation_id);
        $consultation_id = $request->consultation_id;
        $patient_data = DB::table('consultation')->where('id', $consultation_id)->where('doctor_id',Auth::user()->id)->first();
          /*dd($patient_data);*/
         $patient_history = DB::table('patients')->where('user_id',$patient_data->patient_id)->first();
        // dd($patient_history);
         $images = DB::table('product_imagess')->where('consultation_id',$consultation_id
             )->get();
       //  dd($images);
      $returnHTML = view('ecc_popup_show')->with(compact('patient_data','patient_history','images'))->render();
        
        return response()->json( array('status' => true, 'html'=>$returnHTML) );

    }  

    ///ajax call for appoint is different because we have two different authicate users/////
     public function patient_call_ecc_popup(Request $request)
    {
       // dd($request->consultation_id);
        $consultation_id = $request->consultation_id;
        $patient_data = DB::table('consultation')->where('id', $consultation_id)->where('patient_id',Auth::user()->id)->first();
       // dd($patient_data);
         $patient_history = DB::table('patients')->where('user_id',$patient_data->patient_id)->first();
        // dd($patient_history);
         $images = DB::table('product_imagess')->where('consultation_id',$consultation_id
             )->get();
       //  dd($images);
      $returnHTML = view('ecc_popup_show')->with(compact('patient_data','patient_history','images'))->render();
        
        return response()->json( array('status' => true, 'html'=>$returnHTML) );

    }
    ///////end////////////////

   public function MailSend(Request $request){

         $inquiry = new inquiry;

        $inquiry->inquiries_email = $request->inquiries_email;
  
        $inquiry->save();

             // Email code starts here
                        $data = array();
    
                        $data['inquiries_email'] = $request->inquiries_email;
                        
                        
                            /*For Admin Order Email Method */
                        Mail::send('mailingtemplates.confirmation', ['data' => $data], function ($m) use ($data) {
                                $m->from('rosedev200@gmail.com', 'DRIP');
                                $m->to($data['inquiries_email'],'DRIP')->subject('DRIP');
                        });

            
        Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();

   }
   
public function ECC_card(Request $request){
   // dd($request->id);
    $id = $request->id;
    $patient_data = DB::table('consultation')->where('id', $id)->first();
   //dd($patient_data);
         $patient_history = DB::table('patients')->where('user_id',$patient_data->patient_id)->first();
        //dd($patient_history);
         $images = DB::table('product_imagess')->where('consultation_id',$id
             )->get();
         return view('ECC_Qr_card')->with(compact('patient_data','patient_history','images'));
  
   }
	
	
	
	
    public function patient_medical_history_delete(Request $request){
        // dd($request->surg_value);
          $values = rtrim($request->value,"~");
          $values = explode("~",$values);
            $updateArr['past_medical_history'] =  $values;         
        if($_POST['patient_id'] == ''){
            DB::table('patients')
            ->where('user_id',Auth::user()->id)
            ->update($updateArr);
        }
        else{
            DB::table('patients')
            ->where('user_id',$_POST['patient_id'])
            ->update($updateArr);
      
        }
           return response()->json( array('status' => true) );

}
 public function patient_surgical_history_delete(Request $request){
          $surg_value = rtrim($request->surg_value,"~");
          $surg_value = explode("~",$surg_value);
         
           $updateArr['Surgeries1'] =  $surg_value;
                
        if($_POST['patient_id'] == ''){
            DB::table('patients')
            ->where('user_id',Auth::user()->id)
            ->update($updateArr);
        }
        else{
            DB::table('patients')
            ->where('user_id',$_POST['patient_id'])
            ->update($updateArr);
      
        }
       

           return response()->json( array('status' => true) );
        
    
    }

     public function patient_family_history_delete(Request $request){
          $fam_values = rtrim($request->fam_values,"~");
          $fam_values = explode("~",$fam_values);
         
           $updateArr['family_medical_condition'] =  $fam_values;
                
        if($_POST['patient_id'] == ''){
            DB::table('patients')
            ->where('user_id',Auth::user()->id)
            ->update($updateArr);
        }
        else{
            DB::table('patients')
            ->where('user_id',$_POST['patient_id'])
            ->update($updateArr);
      
        }
    
           return response()->json( array('status' => true) );
        
    } 
     public function patient_allergies_delete(Request $request){

          $allergy = rtrim($request->allergy,"~");
          $allergy = explode("~",$allergy);
        // dd($allergy);
           $updateArr['allergies'] =  $allergy;
                
        if($_POST['patient_id'] == ''){
            DB::table('patients')
            ->where('user_id',Auth::user()->id)
            ->update($updateArr);
        }
        else{
            DB::table('patients')
            ->where('user_id',$_POST['patient_id'])
            ->update($updateArr);
      
        }
    
           return response()->json( array('status' => true) );
        
    }     public function patient_current_medication_delete(Request $request){
        //    dd($request);
          $medication = rtrim($request->medication,"~");
          $medication = explode("~",$medication);
        // dd($allergy);
           $updateArr['Current_medication1'] =  $medication;
                
        if($_POST['patient_id'] == ''){
            DB::table('patients')
            ->where('user_id',Auth::user()->id)
            ->update($updateArr);
        }
        else{
            DB::table('patients')
            ->where('user_id',$_POST['patient_id'])
            ->update($updateArr);
      
        }
    
           return response()->json( array('status' => true) );
        
    }
    ///////end////////////////
}
