<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ecc;
use Illuminate\Http\Request;
use Image;
use File;

class EccController extends Controller
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $ecc = Ecc::where('Ecc_price', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $ecc = Ecc::paginate($perPage);
            }

            return view('admin.ecc.index', compact('ecc'));
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.ecc.create');
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'Ecc_price' => 'required'
		]);

            $ecc = new ecc($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $ecc_path = 'uploads/eccs/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($ecc_path) . DIRECTORY_SEPARATOR. $profileImage);

                $ecc->image = $ecc_path.$profileImage;
            }
            
            $ecc->save();

            return redirect('admin/ecc')->with('message', 'Ecc added!');
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $ecc = Ecc::findOrFail($id);
            return view('admin.ecc.show', compact('ecc'));
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $ecc = Ecc::findOrFail($id);
            return view('admin.ecc.edit', compact('ecc'));
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'Ecc_price' => 'required'
		]);
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $ecc = ecc::where('id', $id)->first();
            $image_path = public_path($ecc->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/eccs/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/eccs/'.$fileNameToStore;               
        }


            $ecc = Ecc::findOrFail($id);
             $ecc->update($requestData);

             return redirect('admin/ecc')->with('message', 'Ecc updated!');
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
        $model = str_slug('ecc','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Ecc::destroy($id);

            return redirect('admin/ecc')->with('flash_message', 'Ecc deleted!');
        }
        return response(view('403'), 403);

    }
}
