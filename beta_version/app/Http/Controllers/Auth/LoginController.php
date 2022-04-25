<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\imagetable;
use Session;
use DB;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
          $logo = imagetable::
               select('img_path')
               ->where('table_name','=','logo')
               ->first();
       
          $favicon = imagetable::
                           select('img_path')
                           ->where('table_name','=','favicon')
                           ->first();  

        View()->share('logo',$logo);
        View()->share('favicon',$favicon);
    }

    public function PhysicianLoginAction(Request $request)
    {   
        
        $input = $request->all();
  
        // $this->validate($request, [
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'MDCN';
        
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            Session::flash('message', 'You have logged In  Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('physician-dashboard/Physician'); 
               
            //return redirect()->route('home');
        }else{
            
            // Session::flash('message', 'Email/MDCN And Password Are Wrong.'); 
            // Session::flash('alert-class', 'alert-danger'); 
             Session::flash('flash_message', 'Please enter valid credentials'); 
                Session::flash('alert-class', 'alert-success'); 
               return back();  
          //  return redirect()->route('PhysicianLogin')
             //   ->with('error','Email/MDCN And Password Are Wrong.');
        }
          
    }



    public function authenticated(Request $request, $user)
    {
			//dd($request);
			activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedIn');
       // dd($user);
          if(auth()->user()->isAdmin() == true) {
               return redirect('admin/dashboard');
          } 
		      
          if($user->customer_status == '0') {
            Session::flash('flash_message', 'Your Account has been Blocked!'); 
            Session::flash('alert-class', 'alert-success'); 
              $user = auth()->user();
             activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
           $this->guard()->logout();
            return back();
          }
            
            if($user->Is_deleted == '1') {
            Session::flash('flash_message', 'Your Account has been Deleted!'); 
            Session::flash('alert-class', 'alert-success'); 
              $user = auth()->user();
             activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
           $this->guard()->logout();
            return back();
          }
		    
		  
          if($user->customer_status == '4') {
             $MDCN_validation = DB::table('users')->where('MDCN',$request->MDCN)->where('customer_status','=',4)->first();
              // dd($MDCN_validation);
            if($MDCN_validation == ''){
            Session::flash('flash_message', 'MDCN does not exist'); 
            Session::flash('alert-class', 'alert-success'); 
             $user = auth()->user();
             activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
           $this->guard()->logout();
            return back();
            }

            if($user->status_Incomplete == "Yes") {
              return redirect('/patient-dashboard/steps/'.$user->id);
           }
            
        
          else{
             Session::flash('message', 'You have logged In  Successfully'); 
             Session::flash('alert-class', 'alert-success'); 
            return redirect('patient-dashboard/consultation');
                    

             
           }
           
           
           
           
           
           
          } 



	
          ///physician logoin //////
          
           if($user->customer_status == '3') 
		   {
			  //dd('test');
			if($user->MDCN == $request->MDCN){
				// dd('test');
				Session::flash('message', 'You have logged In  Successfully'); 
                Session::flash('alert-class', 'alert-success'); 
               return redirect('physician-dashboard/Physician');  
				  
			  }
			  else{
				  activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
            $this->guard()->logout();
            $request->session()->invalidate();
				  Session::flash('flash_message', 'Invalid entry of MDCN'); 
                Session::flash('alert-class', 'alert-success'); 
               return back();
				  
				  
			  }
			   }
			if($user->customer_status == NULL) 
		   {	//dd('test');
			  activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
            $this->guard()->logout();
            $request->session()->invalidate();
				  Session::flash('flash_message', 'Please enter valid Credentials'); 
                Session::flash('alert-class', 'alert-success'); 
               return back();
			  }
			
			   
        //    if($user->Is_approved == 'Approved'){
       //      $insertArr['Is_online'] = 1;
        //     DB::table('profiles')
    //  ->where('user_id', Auth::user()->id)
    //  ->update(
    //    $insertArr
     // );
              
            //  Session::flash('message', 'You have logged In  Successfully'); 
            //    Session::flash('alert-class', 'alert-success'); 
           ///    return redirect('physician-dashboard/Physician');
           //  }
			
			// else{
           //   activity($user->name)
           // ->performedOn($user)
           // ->causedBy($user)
           // ->log('LoggedOut');
          //  $this->guard()->logout();
          //  $request->session()->invalidate();
          //  Session::flash('message', 'Please wait for Admin Approval'); 
             //   Session::flash('alert-class', 'alert-success'); 
             //  return back();
         // } 
        
          ///physician login end //////
     // else {
		//  activity($user->name)
       //     ->performedOn($user)
          //  ->causedBy($user)
        //   ->log('LoggedOut');
         // $this->guard()->logout();
         // $request->session()->invalidate();
         //   Session::flash('message', 'These Credentials do not matached our records'); 
         //   Session::flash('alert-class', 'alert-success'); 
           //  return back();
        // }     

    }

    public function logout(Request $request)
    {

        $user = auth()->user();
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
      
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/'); 

        /* $user = auth()->user();
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');


        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/');*/
    
    }
    
}
