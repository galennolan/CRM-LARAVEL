<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GanticontactController extends Controller
{
    function index()
    {
    	$data = DB::table('contact')
		->select('contact.id', 'contact.Contact_First', 'contact.Address', 'contact.Status','contact_status.status')
        ->leftJoin('contact_status','contact_status.id', '=','contact.Status')
		
        ->get();
    	return view('ganticontact', compact('data'));
        //return response()->json($data);
    }

    function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$ok = array(
    				'Contact_First'	=>	$request->Contact_First,
    				'Status'	=>	$request->Status

    			);
               DB::table('contact')  
                
    			->where('contact.id', $request->id)
    			->update($ok);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('contact')
    				->where('contact.id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
}