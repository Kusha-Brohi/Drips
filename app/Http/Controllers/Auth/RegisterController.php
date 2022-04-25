<?php

namespace App\Http\Controllers\Auth;

use App\Profile;
use App\Patient;
use App\orders;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Session;
use DB;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
       $this->middleware('guest');
        if($_POST['user_id'] != '')
        {
            $insert = array();
            $insert['fname'] = $_POST['fname'];
          
            
            DB::table('patients')
            ->where('user_id', $_POST['user_id'])
            ->update(
                    $insert
            );
            
            return back();
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users' ,
            'password' => 'required|string|min:6',
			
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   
        //dd($request);
        $validator = $this->validator($request->all());
    
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator, 'registerForm');
        }
        
        event(new Registered($user = $this->create($request->all())));
     if($request->customer_status == '3'){

                        // Email code starts here
                  // $data = array();
                   //    $data['name'] = $request->name;
                    //   $data['email'] = $request->email;
                        
                        
                            /*For Admin Order Email Method */
                //  Mail::send('mailingtemplates.accountRequest', ['data' => $data], function ($m) use ($data) {
                 //              $m->from('daltondeveloper.testing@gmail.com', 'Drips');
                   //            $m->to($data['email'],'drip')->subject('Account Approval');
                   //    });
      
                        // Email code ends here
 
              Session::flash('message', 'Thankyou! Please wait for account approval email!'); 
       Session::flash('alert-class', 'alert-success'); 
        return $this->registered($request, $user)
                        ?: redirect('/');
        }
        elseif($request->customer_status == '4'){
            
                
                       //dd($user);
                       $data = array();
                       $data['name'] = $user->name;
                       $data['email'] = $user->email;
						
                       $data['id'] = $user->id;
						
							
			
                        $data['email'] = $request->email;
                          // dd($data);
                        
                            //For Admin Order Email Method 
             Mail::send('mailingtemplates.steps', ['data' => $data], function ($m) use ($data) {
                               $m->from('contact@dripsmedical.com', 'Drips');
                               $m->to($data['email'],'drip')->subject('Registration Process');
                       });
          $this->guard()->login($user);
        Session::flash('message', 'Verification Link has been send to your email!'); 
        Session::flash('alert-class', 'alert-success'); 
         
        return $this->registered($request, $user)
                       //?: redirect($this->redirectPath());
                                         
                
                          ?: redirect('/patient-dashboard/register');
                     }


                     else{
                      //  $this->guard()->login($user);
                        return $this->registered($request, $user)
                       ?: redirect($this->redirectPath());
                     }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'customer_status' => $data['customer_status'],
            'status_Incomplete' => $data['status_Incomplete'],
        ]);
    }
    
    protected function registered(Request $request, $user)
    {   

        if($request['customer_status']=='3')
        {
            if($user->profile == null)
         {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->license_number = $request->license_number;
            $profile->customer_status = $request->customer_status;
            $profile->save();
            
            if(isset($_POST['role']) && ($_POST['role']=='physician'))
            {
            activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('Registered');
            $user->assignRole('physician');
            
            }else {
            
            activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('Registered');
            $user->assignRole('physician');
            
            }
         }
        }
    

    elseif ($request['customer_status']=='4')
        {
           if($user->patient == null)
           // dd('test');
        {
            $patient = new Patient();
            // dd($patient);       
            $patient->user_id = $user->id;
            $patient->fname = $user->name;
            $patient->lname = $user->lname;
             $patient->customer_status = $user->customer_status;
       
            $patient->save(); 
             // dd($patient); 
            if(isset($_POST['role']) && ($_POST['role']=='patient'))
            {
            activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('Registered');
            $user->assignRole('patient');
            
            }else {
            
            activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('Registered');
            $user->assignRole('user');
            
            }

         }
        }


    }


}
