<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Symtom;
use Illuminate\Http\Request;
use Image;
use File;

class SymtomController extends Controller
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $symtom = Symtom::where('name', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $symtom = Symtom::paginate($perPage);
            }

            return view('admin.symtom.index', compact('symtom'));
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('admin.symtom.create');
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $symtom = new symtom($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $symtom_path = 'uploads/symtoms/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($symtom_path) . DIRECTORY_SEPARATOR. $profileImage);

                $symtom->image = $symtom_path.$profileImage;
            }
            
            $symtom->save();

            return redirect('admin/symtom')->with('flash_message', 'Symtom added!');
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $symtom = Symtom::findOrFail($id);
            return view('admin.symtom.show', compact('symtom'));
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $symtom = Symtom::findOrFail($id);
            return view('admin.symtom.edit', compact('symtom'));
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $symtom = symtom::where('id', $id)->first();
            $image_path = public_path($symtom->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/symtoms/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/symtoms/'.$fileNameToStore;               
        }


            $symtom = Symtom::findOrFail($id);
             $symtom->update($requestData);

             return redirect('admin/symtom')->with('flash_message', 'Symtom updated!');
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
        $model = str_slug('symtom','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Symtom::destroy($id);

            return redirect('admin/symtom')->with('flash_message', 'Symtom deleted!');
        }
        return response(view('403'), 403);

    }
}
