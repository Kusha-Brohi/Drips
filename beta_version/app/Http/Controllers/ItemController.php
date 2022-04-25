<?php
namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;


class ItemController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    // http://localhost/Drip_12_july/pdfview?download=pdf
    public function pdfview(Request $request)
    {   

        $data['items'] = $items = DB::table("prescription")->get();
        $data['name'] = 'Mike Murphy Khan';
        $data['MRN'] = 'DMS001234';
        $data['DOB'] = '7/13/1998';
        $data['Diagnosis'] = 'Fever';
        $data['sex'] = 'male';
        $data['allergies'] = 'flu';
        $data['date'] = '7/13/2021';
        $data['doc_name'] = 'Physician';
        $data['mdcn'] = '123456';
     
        view()->share('data',$data);

 
        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdfview->download('pdfview.pdf');
        }
/*  dd($data);
        return view('pdfview');*/
    }
}