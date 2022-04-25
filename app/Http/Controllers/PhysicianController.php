<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;

use App\newsletter;
use App\post;
use App\Order;
use App\Note;
use App\banner;
use App\imagetable;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Prescription;
use Image;
use File;


class PhysicianController extends Controller
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
        View()->share('favicon',$favicon);
        View()->share('portal_logo',$portal_logo);

    } 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

        public function index(){

        return view('physician-dashboard.physicianLogin');
    }   
    public function PhysicianLogin(){

        return view('physician-dashboard.physicianLogin');
    }   
  
  public function PhysicianSignup(){

        return view('physician-dashboard.physicianSignup');
    }   

     public function Physician(){
		 
            if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
       }else{
			$currentDate = date('Y-m-d');
      /*  $scheduled = DB::table('consultation')->where('doctor_id',Auth::user()->id)->where('Is_accept','pending')->get();*/
     $complain = DB::table('consultation')->where('doctor_id',Auth::user()->id)->where('status', 1)->where('is_deleted',0)->get();
      
		return view('physician-dashboard.physician',compact('complain'));
    }



    } 

    public function DeleteConsultation(Request $request){
        
        $consultation_id = $request->id;
      
        DB::table('consultation')
       ->where('id',$consultation_id)
       ->update(['is_deleted'=>1]);

       Session::flash('message', 'Consultation Deleted!'); 
        Session::flash('alert-class', 'alert-success'); 
         return back();
  return redirect('/physician-dashboard/Physician');
    }


    public function Account(){
			
		if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
       }else{  
        return view('physician-dashboard.account-setting');
	   }
    }   
   
    public function Consultation(){
            
			if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
       }else{  
            $id = $_GET['id'];

            $patient_data = DB::table('consultation')->where('id', $id)->where('doctor_id',Auth::user()->id)->where('is_deleted',0)->first();
               // dd($patient_data);
             $images = DB::table('product_imagess')->where('consultation_id',$id
             )->get();
               
            $prescription = DB::table('prescription')->where('prescription_by', '=', 'doctor')->where('consultation_id', $id)->where('patient_id',$patient_data->patient_id)->get();
		   $patient_prescription = DB::table('prescription')->where('prescription_by', '=', 'patient')->where('consultation_id', $id)->get();
            $patient_history = DB::table('patients')->where('user_id',$patient_data->patient_id)->first();

            $Note =DB::table('notes')->where('consultation_id', $id)->first();
             
            $subjectives = DB::table('subjectives')->where('consultation_id', $id)->first();
			$myorder = DB::table('patient_orderlist')->where('testresult_by', '=', 'doctor')->where('consultation_id', $id)->get();
               $patient_test_result = DB::table('patient_orderlist')->where('testresult_by', '=', 'patient')->where('consultation_id', $id)->get();    
        return view('physician-dashboard.profile-consultation',compact('patient_test_result','patient_prescription','myorder','patient_data','patient_id','prescription','patient_history','Note', 'subjectives','images'));
	   }
    }  
	
    public function MedicalHistory(){

        return view('physician-dashboard.profile-medical-history');
    }   
    public function Profile(){
        
        return view('physician-dashboard.profile');
    }   
       public function Requested(){
		   
		if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
       }else{  
        $currentDate = date('Y-m-d');
        $request = DB::table('consultation')
        ->where('doctor_id',Auth::user()->id)
        ->where('status',0)->where('is_deleted',0)
        ->get();
        return view('physician-dashboard.requested',compact('request'));
	   }
		
		
    }   
     public function Scheduled(){

        return view('physician-dashboard.scheduled');
    }   
  
    public function Prescription(Request $request){


        if($_POST['prescription_id'] == ''){
            $Prescription = new prescription;
            $Prescription->doctor_id = $request->doctor_id;
            $Prescription->patient_id = $request->patient_id;
            $Prescription->consultation_id = $request->consultation_id;
            $Prescription->medication_name = $request->medication_name;
            $Prescription->medication_name2 = $request->medication_name2;
            $Prescription->frequency = $request->frequency;
            $Prescription->duration = $request->duration;
            $Prescription->Diagnosis = $request->Diagnosis;
			$Prescription->prescription_by = $request->prescription_by;

              $file = $request->file('file');
                  if ($request->hasFile('file')) {
            $destination_path = 'uploads/Prescription/';
            $profileImage = date("Ymd").".".$file->getClientOriginalExtension();
           
            Image::make($file)->insert("public/images/watermark.png", 'center', 10, 10)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);
       
            $Prescription->file = $destination_path.$profileImage;
            }
/*               if ($request->hasFile('file')) {

            $folderName = '/uploads/Prescription/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('file')->getClientOriginalName();
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);

            $Prescription->file  = 'uploads/Prescription/'.$safeName;
                }
         */
               
            $Prescription->save();
        }
        else{
		
            $updateArr['medication_name'] = $_POST['medication_name'];
            $updateArr['medication_name2'] = $_POST['medication_name2'];
            $updateArr['frequency'] = $_POST['frequency'];
            $updateArr['duration'] = $_POST['duration'];
            $updateArr['Diagnosis'] = $_POST['Diagnosis'];
      
                 $file = $request->file('file');
              if ($request->hasFile('file')) {
            
            $Prescription = Prescription::where('id', $id)->first();
            $image_path = public_path($Prescription->file); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('file');
            $fileNameExt = $request->file('file')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/Prescription/');
            Image::make($file)->insert("public/images/watermark.png", 'center', 10, 10)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $updateArr['file'] = 'uploads/Prescription/'.$fileNameToStore;               
        }
        
             /*   //make sure yo have image folder inside your public
                $resume_path = 'uploads/Prescription/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

               //$request->file->move(public_path($resume_path) . DIRECTORY_SEPARATOR. $profileImage);
               $request->file->move(public_path('uploads/Prescription/'), $profileImage);

                $updateArr['file'] = $resume_path.$profileImage;*/


            DB::table('prescription')
            ->where('id', $_POST['prescription_id'])
            ->update($updateArr);
        }
        
            
        Session::flash('message', 'Your Prescription has been submitted successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }  

    public function Order(Request $request){
       
        $Order = new Order;
        $Order->doctor_id = $request->doctor_id;
        $Order->patient_id = $request->patient_id;
        $Order->consultation_id = $request->consultation_id;
		$Order->testresult_by = $request->testresult_by;
        $Order->text = $request->text;
        $Order->ordernote = $request->ordernote;
		
    //    $file = $request->file('file');

        //    $folderName = '/uploads/orderfile/';
         //   $destinationPath = public_path() . $folderName;
        //    $fileName = $request->file('file')->getClientOriginalName();
         //   $fileExt = $request->file('file')->getClientOriginalExtension();
        //    $safeName = $fileName.'_'.time().'.'.$fileExt;
        //    $file->move($destinationPath, $safeName);
        //    $Order['file'] = 'uploads/orderfile/'.$safeName;
       //   dd($Order);
        $Order->save();
            
        Session::flash('message', 'Your Order has been submitted successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return back();
    }
   

 public function pendingConsultations(){
		
		//$consult = $_GET['consult'];
		
	 	if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
       }
	   else{  
	
		$complain = DB::table('consultation')->where('doctor_id',Auth::user()->id)->where('status', 1)->where('is_deleted',0)->get();
		
		
		return view('physician-dashboard.pendingConsultations',compact('complain'));
	
	   }
   }

   public function Note(Request $request){
       
       $clname = isset($_POST['columname']) ? $_POST['columname'] : '';
       
       if(!empty($clname)) :
           $data = array();
           $note_id = $request->note_id;
           $data  = array();
           $data[$clname] = $request->objective;
           if($note_id == 0){
               $data['doctor_id'] = $request->doctor_id;
               $data['patient_id'] = $request->patient_id;
               $data['consultation_id'] = $request->consultation_id;
               DB::table('notes')->insert($data);
           }
           else{
            DB::table('notes')->where('id', $note_id)->update($data);
        
           }
        endif;

        return back();
 
   }

   public function subjectives_save(Request $request){

    $subjective = DB::table('subjectives')->where('id', $_POST['subjectives_id'])->first();

    $complain_history = $subjective->complain_history;
    $diagnosis = $subjective->diagnosis;
    $plan = $subjective->plan;

    if($_POST['field_type'] == 'complain_history'){
        $complain_history = $_POST['complain_history'];
    }
    elseif ($_POST['field_type'] == 'diagnosis') {
        $diagnosis = $_POST['diagnosis'];
    }
    elseif ($_POST['field_type'] == 'plan') {
        $plan = $_POST['plan'];
    }


    if($_POST['subjectives_id'] == ''){

        $insertArr['doctor_id'] = $_POST['doctor_id']; 
        $insertArr['patient_id'] = $_POST['patient_id']; 
        $insertArr['consultation_id'] = $_POST['consultation_id']; 
        $insertArr['complain_history'] = $complain_history;
        $insertArr['diagnosis'] = $diagnosis;
        $insertArr['plan'] = $plan;

        DB::table('subjectives')->insert(
                            $insertArr
                        );
    }
    else{
        $updateArr['complain_history'] = $complain_history;
        $updateArr['diagnosis'] = $diagnosis;
        $updateArr['plan'] = $plan; 

        DB::table('subjectives')->where('id', $_POST['subjectives_id'])->update(
                            $updateArr
                        );
    }

        return back();

    }


    public function delete_prescription($prescription_id){

        DB::table('prescription')->where('id', $prescription_id)->delete();
        return back();
        
        
    }
  public function delete_testresult($testresult_id){

        DB::table('patient_orderlist')->where('id', $testresult_id)->delete();
        return back();
        
        
    }
public function zoomSubmit(Request $request){

        $insertArr['consultation_id'] = $_POST['consultation_id']; 
        $insertArr['zoom_id_link'] = $_POST['zoom_id_link']; 
        $insertArr['description'] = $_POST['description']; 

        DB::table('zoom_meeting')->insert($insertArr);

                   // Email code starts here
                        $data = array();
                        
                       $data['zoom_id_link'] = $request->zoom_id_link;
                       $data['description'] = $request->description;
                         //dd($data);
                            
                            /*For Admin Order Email Method */
                       Mail::send('mailingtemplates.zoomLink', ['data' => $data], function ($m) use ($data) {
                            $m->from('contact@dripsmedical.com', 'DRIPS');
                             $m->to($data['zoom_id_link'],'DRIPS')->subject('DRIPS');
                       });

        Session::flash('message', 'Zoom meeting details sent successfully.'); 
        Session::flash('alert-class', 'alert-success'); 

        return back();
        
        
    }

        public function changepassword(){
		if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/physician-dashboard/PhysicianLogin');
       }else{  

       return view('physician-dashboard.changePassword');
	   }
        }
    
/*
        public function end_consultation(Request $request){
 
        $updateArr['status'] = 0;
       $updateArr['hour'] = $request['hour'];
       $updateArr['minute'] = $request['minute'];
       $updateArr['seconds'] = $request['seconds'];

        DB::table('consultation')
       ->where('id', $request->consultation_id)
       ->update($updateArr);
        Session::flash('message', 'Consultation Ended!'); 
        Session::flash('alert-class', 'alert-success'); 
         return back();
       $returnHTML = view('physician-dashboard.profile-consultation');
        return response()->json( array('status' => true, 'html'=>$returnHTML) );
      
    
    }*/

      public function end_consultation(Request $request){
          //  dd($request);
       $updateArr['status'] = 0;
       $updateArr['hour'] = $request['hour'];
       $updateArr['minute'] = $request['minute'];
       $updateArr['seconds'] = $request['seconds'];
    // dd($request['seconds']);
     DB::table('consultation')
       ->where('id', $request->consultation_id)->where('is_deleted',0)
       ->update($updateArr);

        Session::flash('message', 'Consultation Ended!'); 
        Session::flash('alert-class', 'alert-success'); 
         return back();
  return redirect('/physician-dashboard/requested');
        
  }
	
	
}
