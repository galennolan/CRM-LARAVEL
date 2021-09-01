<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Imports\ContactImport;
use App\Contact;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Alert;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contact = \App\contact::All()->whereNull('Sales_Rep');
        $contact_status = \App\Contact_status::All();
        $users = \App\users::all();

            //return response()->json([$contact,$contact_status,$users]);
          return view ('penugasan.contact',['contact'=>$contact,'contact_status'=>$contact_status,'users'=>$users]);
    }
    
    public function test()
    {
        $tt = DB::table('contact')
        ->select('contact.id','contact_status.id','contact.*','contact_status.status')
        ->leftjoin('contact_status', 'contact.Status', '=', 'contact_status.id')
        ->orderBy ('contact_status.status','asc')
        ->get();

        
           //return response()->json([$tt]);
         return view ('pelanggan',['pelanggan'=>$tt]);
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$tt = DB::table('contact')
        ->select('contact.id','contact_status.id','contact.*','contact_status.status')
        ->leftjoin('contact_status', 'contact.Status', '=', 'contact_status.id')
		->where('Contact_First','like',"%".$cari."%")
        ->get();
		//return response()->json($tt);
 
    		// mengirim data pegawai ke view index
		return view('pelanggan',['pelanggan' => $tt]);
 
	}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function importExportView()
    {
       return view('contact');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
   
   
    /**
    * @return \Illuminate\Support\Collection
    */
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=\App\Contact::findorFail($id);
        $users = \App\users::all();
        return view ('penugasan.editpenugasan',['contact'=> $contact ,'users'=>$users]);
        //return response()->json([$contact,$contact_status]);
      //  return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        contact::where('id',$id)
        ->update([
            'Sales_Rep' => $request->users_id,
            
        ]);
        return redirect() ->route ('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
}
