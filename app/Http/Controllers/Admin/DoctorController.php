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

		$this->validate($request, [

			'gender' => 'required',

			'language' => 'required',

			'speciality' => 'required',

			'pic' => 'required'

		]);

			

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

		$doctorData->DOB = $request->DOB;

        $doctorData->phone = $request->phone;

        $doctorData->language = $request->language;

        $doctorData->gender = $request->gender;



        ///image ///



        $file = $request->file('pic');

            

            //make sure yo have image folder inside your public

            $destination_path = 'uploads/doctors/';

            $profileImage = date("Ymd").".".$file->getClientOriginalExtension();

            // dd($destination_path,$profileImage);

            // $file->move(public_path($destination_path), $profileImage);



            Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);



            //save the link of thumbnail into myslq database        

            $doctorData->pic = $destination_path.$profileImage;

		//dd($doctorData);

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

             Mail::send('mailingtemplates.DoctorNotification', ['doctor_data' => $doctor_data], function ($m) use ($doctor_data) {

                                $m->from('contact@dripsmedical.com', 'Drips');

                                $m->to($doctor_data['email'],'drip')->subject('Registration Process');

                        });

            

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

          // dd($profile->Speciality);

            return view('admin.doctor.edit', compact('doctor','profile'));

    

    }

    public function viewuser($id){
        $doctor = DB::table('users')->where('id',$id)->first();

        if (auth()->user()->hasRole('admin')) {
            Session::put('admin', auth()->user()->id);
        }
        Auth::loginUsingId($doctor->id);
        if(Auth::check()){
            return redirect('/physician-dashboard/Physician');
        }
    }

        public function loginasAdmin()
    {
        if(Session::has('admin')) {
            $id = Session::get('admin');
           // dd($id);
            Session::flush();
            Auth::login(User::findorFail($id), true);
        }
        else {
            Session::flush();
        }
        return redirect('/admin/doctor');
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

     // dd($request['password']);

    $specialities_expertise = DB::table('specialities')->where('id',$request->speciality)->first();   

       //dd($specialities_expertise);

        $insertArr['name'] = $_POST['name'];

        $insertArr['medical_school'] = $_POST['medical_school'];

        $insertArr['email'] = $_POST['email'];

        $insertArr['residency'] = $_POST['residency'];

        $insertArr['Speciality'] = $specialities_expertise->id;

        $insertArr['expertise'] = $specialities_expertise->symtom;

        $insertArr['price'] = $_POST['price'];

        $insertArr['MDCN'] = $_POST['MDCN'];

        $insertArr['DOB'] = $_POST['DOB'];

        $insertArr['phone'] = $_POST['phone'];

        $insertArr['gender'] = $_POST['gender'];

        $insertArr['language'] = $_POST['language'];

    

     

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

         //dd($insertArr);

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

            ->where('user_id', $id)

            ->update(

                $insertArr

            ); 

        }

       

    $email_validation = DB::table('users')->where('email',$request->email)->where('id' ,'!=' ,$id)->first();

    $mdcn_validation = DB::table('users')->where('MDCN',$request->MDCN)->where('id' ,'!=' ,$id)->first();

	$password_validation = DB::table('users')->where('id',$id)->first();

	//dd($password_validation);

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

       

		if($password_validation->password != $request['password']){

		$doctor['password']= Hash::make($request['password']); 	

		}

         

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

						//$doctor_data_Updated = array();

                      //  $doctor_data_Updated['name'] = $doctor['name'];

                       // //$doctor_data_Updated['email'] = $doctor['email'];

						//$doctor_data_Updated['MDCN'] = $doctor['MDCN'];

						//$doctor_data_Updated['password'] = $_POST['password'];

                        //$data['email'] = $request->email;

                           //dd($doctor_data_Updated);

                        

                            //For Admin Order Email Method 

          //  Mail::send('mailingtemplates.ProfileUpdate_Notification', ['doctor_data_Updated' => $doctor_data_Updated], function ($m) use ($doctor_data_Updated) {

                        //        $m->from('daltondeveloper.testing@gmail.com', 'Drips');

                       //         $m->to($doctor_data_Updated['email'],'drip')->subject('Account Updated!');

                        //});

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







