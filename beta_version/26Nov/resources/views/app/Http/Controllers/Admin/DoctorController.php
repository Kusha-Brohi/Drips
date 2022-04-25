<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Doctor;
use App\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Image;
use File;
use Auth;
use DB;
use Mail;
use Session;
class DoctorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
       $model = str_slug('User','-');
         $keyword = $request->get('search');
        $perPage = 300;
            if (!empty($keyword)) {
                $doctor = User::where('name', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
                //dd($doctor);
            } else {
                 //$doctor = User::where('customer_status', '=', 3);
                 $doctor = DB::table('users')->where('customer_status', '=', 3)->get();
                // dd($doctor);
            }

            return view('admin.doctor.index', compact('doctor'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
         $model = str_slug('User','-');
      
            return view('admin.doctor.create');
    

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
    
        $email_validation = DB::table('users')->where('email',$request->email)->first();
        
        $mdcn_validation = DB::table('users')->where('MDCN',$request->MDCN)->first();
        
        //dd($email_validation);
            ///create user ////
        $doctor = new User;
        $doctor->name = $request->name;
        $doctor->customer_status = $request->customer_status;
        $doctor->Is_approved = $request->Is_approved;
        if($email_validation != '' ){
            return redirect('admin/doctor')->with('flash_message', 'email already exists');
            
        
        }else{
            
             $doctor->email = $request->email;
        }
        
        if($mdcn_validation != '' ){
            return redirect('admin/doctor')->with('flash_message', 'MDCN already exists');
        }else{
            
             $doctor->MDCN = $request->MDCN;
        }
        
       
        $doctor->password = Hash::make($request['password']);
        $doctor->MDCN = $request->MDCN;
        //dd($doctor);
        
        $doctor->save();
        
        $specialities_expertise = DB::table('specialities')->where('id',$request->speciality)->first();
        
         ////update profile
        $doctorData = new Profile;
        $doctorData->customer_status = $request->customer_status;
        $doctorData->user_id = $doctor->id;
        $doctorData->name = $doctor->name;
        $doctorData->email = $doctor->email;
       // $doctorData->speciality = $doctor->speciality;

        $doctorData->medical_school = $request->medical_school;
        $doctorData->residency = $request->residency;

        $doctorData->speciality = $specialities_expertise->id;
        $doctorData->expertise = $specialities_expertise->symtom;//$request->expertise;


        $doctorData->price = $request->price;
        $doctorData->MDCN = $doctor->MDCN;
        $doctorData->save();
                
                        $doctor_data = array();
                        $doctor_data['name'] = $doctorData->name;
                        $doctor_data['email'] = $doctorData->email;
                        $doctor_data['MDCN'] = $doctorData->MDCN;
                        $doctor_data['id'] = $doctorData->user_id;
                        $doctor_data['password'] = $request->password;
                        //$data['email'] = $request->email;
                           //dd($doctor_data);
                        
                            //For Admin Order Email Method 
         /*    Mail::send('mailingtemplates.DoctorNotification', ['doctor_data' => $doctor_data], function ($m) use ($doctor_data) {
                                $m->from('daltondeveloper.testing@gmail.com', 'Drips');
                                $m->to($doctor_data['email'],'drip')->subject('Registration Process');
                        });*/
            
            return redirect('admin/doctor')->with('message', 'doctor added!');
        /*}*/
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
        $model = str_slug('Doctor','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $doctor = Profile::findOrFail($id);
            return view('admin.doctor.show', compact('doctor'));
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
    public function edit($id)
    {      // dd($id);
         

            $doctor = DB::table('users')->where('id',$id)->first();
           // dd($doctor);
            //dd($doctor);
            $profile = DB::table('profiles')->where('user_id', $id)->first();
            //dd($profile);
            return view('admin.doctor.edit', compact('doctor','profile'));
     
        
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
           
        //dd($id);
        $insertArr['name'] = $_POST['name'];
        $insertArr['medical_school'] = $_POST['medical_school'];
        $insertArr['email'] = $_POST['email'];
        $insertArr['residency'] = $_POST['residency'];
        $insertArr['expertise'] = $_POST['expertise'];
        $insertArr['price'] = $_POST['price'];
        $insertArr['MDCN'] = $_POST['MDCN'];
       
       $profile_data = DB::table('profiles')->where('user_id',$id)->first();
       // dd($profile_data);
        
        if($profile_data == ''){
            $insertArr['user_id'] = $id;
           DB::table('profiles')
            ->where('user_id', $id)
            ->insert(
                $insertArr
            );  
        }
        else{
             DB::table('profiles')
            ->where('id', $id)
            ->update(
                $insertArr
            ); 
        }
        
        
    $email_validation = DB::table('users')->where('email',$request->email)->where('id' ,'!=' ,$id)->first();
    $mdcn_validation = DB::table('users')->where('MDCN',$request->MDCN)->where('id' ,'!=' ,$id)->first();

    //dd($email_validation);
        if($email_validation != ''){
        return back()->with('flash_message', 'email address already exists');
        }else{
        $doctor['email'] = $insertArr['email'];
        $doctor['name'] = $insertArr['name'];
        if($mdcn_validation !=''){
           return back()->with('flash_message', 'MDCN already exists'); 
        }else{
            $doctor['MDCN'] = $insertArr['MDCN'];

        }
        

        $doctor['password']= Hash::make($request['password']);  
        }
        //dd($doctor);
      //  dd($userData);
    /*   $confirmpass['password_confirmation'] = $_POST['password_confirmation'];
       if($password == $confirmpass ){
       if(trim($_POST['password']) != "") {
       $userData['password'] = Hash::make($_POST['password']);
     } */
      DB::table('users')
     ->where('id', $request->user_id)
     ->update(
     $doctor
      );

//}
      /*  $requestData = DB::table('profiles')->where('user_id', Auth::user()->id)->first();
        
            $requestData = $request->all();
            
        if ($request->hasFile('image')) {
            
            $doctor = Profile::where('id', $id)->first();
  
            $image_path = public_path($doctor->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/doctors/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/doctors/'.$fileNameToStore;               
        }


            $doctor = Profile::findOrFail($id);
             $doctor->update($requestData);
*/
             return redirect('admin/doctor')->with('message', 'Doctor updated!');
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
      
            //User::destroy($id);
            $doctor = DB::table('users')->where('id',$id)->delete();

            return redirect('admin/doctor')->with('flash_message', 'Doctor deleted!');
      

    }
}



