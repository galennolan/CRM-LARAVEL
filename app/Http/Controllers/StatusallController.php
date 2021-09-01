<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatusallController extends Controller
{
    function index()
    {
    	$data = DB::table('notes')
        ->leftJoin('users','users.id', '=','notes.Sales_Rep')
		->leftJoin('contact','contact.id', '=','notes.contact')
		->leftJoin('todo_desc','todo_desc.id', '=','notes.todo_Desc_ID')
		
        ->get();
    	return view('statusall', compact('data'));
        //return response()->json($data);
    }

    function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$ok = array(
    				'Date'	=>	$request->date,
    				'notes'		=>	$request->notes,
    				'Task_Status'		=>	$request->Task_Status
                   
                 
    			);
               DB::table('notes')  
                
    			->where('idu', $request->idu)
    			->update($ok);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('notes')
    				->where('idu', $request->idu)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
}