<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Speciality;
use Illuminate\Http\Request;
use Image;
use File;
use App\symtom;
use DB;

class SpecialityController extends Controller
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
        $model = str_slug('speciality','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $speciality = Speciality::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $speciality = Speciality::paginate($perPage);
            }

            return view('admin.speciality.index', compact('speciality'));
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
        $model = str_slug('speciality','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            //$symtom = Symtom::pluck('name', 'id');
            $options = DB::table('symtoms')->get()->toArray();
          //dd($options);
            return view('admin.speciality.create',compact('options'));
        }
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
        $model = str_slug('speciality','-');
      
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
          
            $speciality = new speciality($request->all());
         if(!empty($request->option))
            {
            
            $speciality->symtom=implode(",",$request->option);  
            
            }
           // $speciality->symtom = $request->symtom;  
           //dd($speciality->symtom);

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $speciality_path = 'uploads/specialitys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($speciality_path) . DIRECTORY_SEPARATOR. $profileImage);

                $speciality->image = $speciality_path.$profileImage;
            }
          //dd($speciality);
            $speciality->save();


            return redirect('admin/speciality')->with('flash_message', 'Speciality added!');
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
        $model = str_slug('speciality','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $speciality = Speciality::findOrFail($id);
            return view('admin.speciality.show', compact('speciality'));
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
    {
        $model = str_slug('speciality','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $speciality = Speciality::findOrFail($id);
           $options = DB::table('symtoms')->get()->toArray();
          //  dd($symtom_option);
            return view('admin.speciality.edit', compact('speciality','options'));
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
        $model = str_slug('speciality','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
             $requestData['symtom'] = implode(",",$request->option);
        if ($request->hasFile('image')) {
            
            $speciality = speciality::where('id', $id)->first();
            $image_path = public_path($speciality->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/specialitys/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/specialitys/'.$fileNameToStore;               
        }


            $speciality = Speciality::findOrFail($id);
             $speciality->update($requestData);

             return redirect('admin/speciality')->with('flash_message', 'Speciality updated!');
        }
        return response(view('403'), 403);

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
        $model = str_slug('speciality','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Speciality::destroy($id);

            return redirect('admin/speciality')->with('flash_message', 'Speciality deleted!');
        }
        return response(view('403'), 403);

    }
}
