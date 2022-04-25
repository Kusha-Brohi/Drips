<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\orders;
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
use App\Consultation;
use PDF;
use Str;
use file;
use Image;
use App\Order;


/*use Illuminate\Foundation\Auth\RegistersUsers;*/

class PatientController extends Controller
{   
	/*use RegistersUsers;*/
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

        return view('patient-dashboard.patientLogin');
    }   
    public function login(){

    	return view('patient-dashboard.patientLogin');
    }

    public function Register(){

      return view('patient-dashboard.patientregister');
    } 




    public function BillingInformation(){

        return view('patient-dashboard.billing-information');
    }

    public function MyOrder(){
		    if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
      $myConsultations = DB::table('consultation')->where('patient_id', Auth::user()->id)->get();

      return view('patient-dashboard.my-order',compact('myConsultations'));
	  
	   }
    }    
  public function MyTest(){
        if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
      $myConsultations = DB::table('consultation')->where('patient_id', Auth::user()->id)->get();

      return view('patient-dashboard.my-order',compact('myConsultations'));
    
     }
    }

    public function MyPrescription(){
		
		    if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
		
        $myConsultations = DB::table('consultation')->where('patient_id', Auth::user()->id)->get();
	    $consultation_id = $_GET['id'];
        return view('patient-dashboard.my-prescription',compact('myConsultations'));
	   }
		
		
    }
    public function ParentDirectory(){
	 if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
        return view('patient-dashboard.parent-directory');
	   }
    }
    public function RequestConsultation(){
        if (!Auth::user()) {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }else{
        return view('patient-dashboard.consultation');
      }
    }
    public function SheduledConsultation(){
            
       if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
        $consultation = DB::table('consultation')->where('patient_id',Auth::user()->id)->where('doctor_id','>',0)->get();

            $consultation_id = $_GET['id'];
            Consultation::destroy($consultation_id);
                
        return view('patient-dashboard.sheduled-consultation',compact('consultation','consultation_id'));
      }
    }
    public function steps($id){
			if (Auth::user()) {
          $userdata = DB::table('users')->where('id',$id)->first();
         // dd($userdata);
          /*$this->guard()->login($userdata);*/
        /*  dd($userdata);*/
          $popupdata = DB::table('patients')->where('user_id',$userdata->id)->first();
         // dd($popupdata);
        return view('patient-dashboard.steps',compact('userdata','popupdata'));
			}
			else{
		 Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
				
			}
      
    }



    public function PastConsultation(){
            $currentDate = date('Y-m-d');
            $consultation = DB::table('consultation')->where('patient_id',Auth::user()->id)->
            where('date','<',$currentDate)->get();
            
           
        return view('patient-dashboard.past_consultation',compact('consultation'));
    }


     public function Submitcard(Request $request){
     // dd($request);
    $consultation = Session::get('consultation');
    $consultation['doctor_id'] = $request->doctor_id;

    Session::put('consultation',$consultation);
    $consultation = new consultation($consultation);
        //dd($consultation);
       $consultation->save();

                foreach ($consultation->images as $key => $value) {
                    DB::table('product_imagess')->insert(
                        ['image' => $value, 'consultation_id' => $consultation->id]
                    );   
                }

             /*    foreach ($consultation->problem as $key => $value) {
                    DB::table('consultation')->insert(
                        ['problem' => $value, 'id' => $consultation->id]
                    );   
                }*/
                    
                    Session::forget('consultation');
                    Session::flash('message', 'Thank you for contacting us. We will get back to you asap'); 
                   Session::flash('alert-class', 'alert-success');
              /*     return view('patient-dashboard.consultation',compact('consultation'));*/
                   return redirect('gtpayMerchant');
                  // return redirect('test-merchant')->route('checkoutSubmit', ['id'=>$orders->id]); ;
                    //return view('patient-dashboard.consultation',compact('consultation'));

     }

   public function Complaint(){
        $Complaint = DB::table('consultation')->where('patient_id',Auth::user()->id)->where('doctor_id','>',0)->orderBy('id','desc')->get();

        $popupdata = DB::table('patients')->where('user_id',Auth::user()->id)->first();
        $userdata = DB::table('users')->where('id',$popupdata->user_id)->first();
          //dd($userdata);
        return view('patient-dashboard.complaint-card',compact('Complaint','popupdata','userdata'));
    }   

    public function patient_medical_history(){
		
		 if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
        $patient_history = DB::table('patients')->where('user_id',Auth::user()->id)->first();
		
        return view('patient-dashboard.patient_medical_history', compact('patient_history'));
	   }
    }

    public function patient_medical_history_edit(Request $request){
	//dd($_POST['history_description']);
		
        $updateArr[$_POST['history_title']] = json_encode($_POST['history_description']); 
	
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
        

        return back();
    }


    public function Consultation(){
       if (!Auth::user())
       {
            Session::flash('flash_message', 'Please Login to your account'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/patient-dashboard/patientLogin');
       }
       else
       {
            $id = $_GET['id'];
            //dd($id);
            $patient_data = DB::table('consultation')->where('id', $id)->first();
            
            $patient_history = DB::table('patients')->where('user_id',$patient_data->patient_id)->first();
            
            $Note =DB::table('notes')->where('consultation_id', $id)->first();
            
            $subjectives = DB::table('subjectives')->where('consultation_id', $id)->first();
            
            $prescription = DB::table('prescription')->where('prescription_by', '=', 'doctor')->where('consultation_id', $id)->get();
            //dd($prescription);
            $patient_prescription = DB::table('prescription')->where('prescription_by', '=', 'patient')->where('consultation_id', $id)->get();
            //dd($prescription);
            
            $zoom_meeting = DB::table('zoom_meeting')->where('consultation_id', $id)->first();
            
            $myorder = DB::table('patient_orderlist')->where('testresult_by', '=', 'doctor')->where('consultation_id', $id)->get();
            $patient_test_result = DB::table('patient_orderlist')->where('testresult_by', '=', 'patient')->where('consultation_id', $id)->get();
            $images = DB::table('product_imagess')->where('consultation_id',$id)->get();
            
            return view('physician-dashboard.profile-consultation',compact('patient_test_result','patient_prescription','patient_data','patient_history','Note', 'subjectives', 'zoom_meeting', 'prescription', 'myorder','images'));
	    }
	} 
	
	public function patientprescription(Request $request){
		//dd($request);
		     $Prescription = new prescription;
            $Prescription->doctor_id = $request->doctor_id;
            $Prescription->patient_id = $request->patient_id;
            $Prescription->consultation_id = $request->consultation_id;
			$Prescription->prescription_by = $request->prescription_by;
			
			$file = $request->file('file');

            $folderName = '/uploads/Prescription/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('file')->getClientOriginalName();
            $fileExt = $request->file(file)->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $Prescription['file'] = 'uploads/Prescription/'.$safeName;
	
           /*   $file = $request->file('file');
                  if ($request->hasFile('file')) {
            $destination_path = 'uploads/Prescription/';
            $profileImage = date("Ymd").".".$file->getClientOriginalExtension();
           
            Image::make($file)->insert("public/images/watermark.png", 'center', 10, 10)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);
       
            $Prescription->file = $destination_path.$profileImage;
            }*/
          /*  if ($request->hasFile('file')) {

            $folderName = '/uploads/Prescription/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('file')->getClientOriginalName();
            $fileExt = $request->file('file')->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);

            $Prescription->file  = 'uploads/Prescription/'.$safeName;
                }*/
       
               
            $Prescription->save();
		//	dd($Prescription);
		//$consultation_id = $request->consultation_id;
		
	//	$file = $request->file('file');
         //     if ($request->hasFile('file')) {
         //   
          //  $Prescription = Prescription::where('id', $id)->first();
          //  $image_path = public_path($Prescription->file); 
            
         //   if(File::exists($image_path)) {
         //       File::delete($image_path);
           // }

        
           // $folderName = '/uploads/Prescription/';
           // $destinationPath = public_path() . $folderName;
          //  $fileName = $request->file('file')->getClientOriginalName();
           // $fileExt = $request->file('file')->getClientOriginalExtension();
          //  $safeName = $fileName.'_'.time().'.'.$fileExt;
          //  $file->move($destinationPath, $safeName);
           // $updateArr['file'] = 'uploads/Prescription/'.$safeName;
          //  Image::make($file)->insert("public/images/watermark.png", 'center', 10, 10)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

          //   $updateArr['file'] = 'uploads/Prescription/'.$fileNameToStore;               
      //  }
		//DB::table('prescription')
     //  ->where('consultation_id', $request->consultation_id)
       //->update($updateArr);
		//dd($id);
		Session::flash('message', 'Your Prescription has been uploaded successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
		return back();
		
	}
	
		public function TestResult(Request $request){
			//dd($request->testResult);
		$Order = new Order;
        $Order->doctor_id = $request->doctor_id;
        $Order->patient_id = $request->patient_id;
        $Order->consultation_id = $request->consultation_id;
		 $Order->testresult_by = $request->testresult_by;
     
		
        $file = $request->file('testResult');

            $folderName = '/uploads/orderfile/';
            $destinationPath = public_path() . $folderName;
            $fileName = $request->file('testResult')->getClientOriginalName();
            $fileExt = $request->file(testResult)->getClientOriginalExtension();
            $safeName = $fileName.'_'.time().'.'.$fileExt;
            $file->move($destinationPath, $safeName);
            $Order['testResult'] = 'uploads/orderfile/'.$safeName;
       // dd($Order);
        $Order->save();
		//$consultation_id = $request->consultation_id;
	//	$file = $request->file('testResult');
             // if ($request->hasFile('testResult')) {
            
          //  $patient_orderlist = Order::where('id', $id)->first();
          //  $image_path = public_path($patient_orderlist->testResult); 
            
         //   if(File::exists($image_path)) {
         //       File::delete($image_path);
         //   }

         //   $folderName = '/uploads/orderfile/';
         //   $destinationPath = public_path() . $folderName;
         //   $fileName = $request->file('testResult')->getClientOriginalName();
         //   $fileExt = $request->file('testResult')->getClientOriginalExtension();
          //  $safeName = $fileName.'_'.time().'.'.$fileExt;
         //   $file->move($destinationPath, $safeName);
         //   $updateArr['testResult'] = 'uploads/orderfile/'.$safeName;
          //  Image::make($file)->insert("public/images/watermark.png", 'center', 10, 10)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             //$updateArr['testResult'] = 'uploads/Prescription/'.$fileNameToStore;               
        //}
		//DB::table('patient_orderlist')
     //  ->where('consultation_id', $request->consultation_id)
      // ->update($updateArr);
		//dd($id);
		Session::flash('message', 'Your Test Result has been uploaded successfully!'); 
        Session::flash('alert-class', 'alert-success'); 
		return back();
		
	}
	
      public function changepassword(){
			    if (!Auth::user())
          {
        Session::flash('flash_message', 'Please Login to your account'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect('/patient-dashboard/patientLogin');
       }
		else{
        return view('patient-dashboard.changepassword');
		}
      }


        public function pdfview(Request $request)
    {   
         $consult_id = $_GET['id'];
         $patient_id = $_GET['patient_id'];
         $doctor_id = $_GET['doctor_id'];
        // /dd($doctor_id);
        $data['items'] = $items = DB::table('prescription')->where('consultation_id',$consult_id)->get();
        $userdata = DB::table('patients')->where('user_id',$patient_id)->first();
        $Docdata = DB::table('profiles')->where('user_id',$doctor_id)->first();
        $subjectives = DB::table('subjectives')->where('consultation_id',$consult_id)->first();
/*        $consultation = DB::table('subjectives')->where('consultation_id',$consult_id)->first();*/
		$fname = $userdata->fname;
		$lname = $userdata->lname;
		 $space = " ";
		$data['name'] = $fname . $space. $lname;
        //$data['name'] = $userdata->fname;
        $data['MRN'] = $userdata->user_id;
        $data['DOB'] = $userdata->DOB;
        $data['Diagnosis'] = Str::limit($subjectives->diagnosis, 10);
             /*   dd($test);*/
        $data['sex'] = $userdata->Gender;
		$data['allergies'] = $userdata->allergies;
	//	$data['allergies'] = json_encode($userdata->allergies);
	
      //  $data['date'] =  $subjectives->created_at;
       
        //$date =$subjectives->created_at;
      // $data['date'] = date_format(date_create($subjectives->created_at),"F d, Y");
      $data['date'] = date_format(date_create($subjectives->created_at),"n/j/Y");
      // dd($data['date']);
      /* $month = date("m",strtotime($date));
       $day = date("d",strtotime($date));
       $years = date("y",strtotime($date)); 
       $d_month['month'] = $month;*/
       //dd($d_month['month']);
      
    /*   dd(date("y",strtotime($date)));
       dd(date_format($date,"Y/m/d H:i:s"));*/

        $data['doc_name'] = $Docdata->name;
        $data['mdcn'] = $Docdata->MDCN;

        view()->share('data',$data,'d_month',$d_month);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }
/*  dd($data);
        return view('pdfview');*/
    }
    
    
    
    	   public function orderpdfview(Request $request)
    {   
         $consult_id = $_GET['id'];
         $patient_id = $_GET['patient_id'];
         $doctor_id = $_GET['doctor_id'];
       // dd($doctor_id);
        $data['items'] = $items = DB::table('patient_orderlist')->where('consultation_id',$consult_id)->get();
        $userdata = DB::table('patients')->where('user_id',$patient_id)->first();
        $Docdata = DB::table('profiles')->where('user_id',$doctor_id)->first();
        $subjectives = DB::table('subjectives')->where('consultation_id',$consult_id)->first();
/*        $consultation = DB::table('subjectives')->where('consultation_id',$consult_id)->first();*/
		$fname = $userdata->fname;
		$lname = $userdata->lname;
		 $space = " ";
		$data['name'] = $fname . $space. $lname;
        //$data['name'] = $userdata->fname;
        $data['MRN'] = $userdata->user_id;
        $data['DOB'] = $userdata->DOB;
        $data['Diagnosis'] = Str::limit($subjectives->diagnosis, 10);
             /*   dd($test);*/
        $data['sex'] = $userdata->Gender;
		$data['allergies'] = $userdata->allergies;
	//	$data['allergies'] = json_encode($userdata->allergies);
	
      //  $data['date'] =  $subjectives->created_at;
       
        //$date =$subjectives->created_at;
      // $data['date'] = date_format(date_create($subjectives->created_at),"F d, Y");
      $data['date'] = date_format(date_create($subjectives->created_at),"n/j/Y");
      // dd($data['date']);
      /* $month = date("m",strtotime($date));
       $day = date("d",strtotime($date));
       $years = date("y",strtotime($date)); 
       $d_month['month'] = $month;*/
       //dd($d_month['month']);
      
    /*   dd(date("y",strtotime($date)));
       dd(date_format($date,"Y/m/d H:i:s"));*/

        $data['doc_name'] = $Docdata->name;
        $data['mdcn'] = $Docdata->MDCN;

        view()->share('data',$data,'d_month',$d_month);


        if($request->has('download')){
            $pdf = PDF::loadView('orderpdfview');
            return $pdf->download('orderpdfview.pdf');
        }
/*  dd($data);
        return view('pdfview');*/
    }
    
    
  
}
