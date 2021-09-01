<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('test');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Fetch the particular company details
     * @return json response
     */
      public function chart()
      {
                 $result = \DB::table('notes')
                 ->select('users.Name_First', DB::raw('COUNT(*) as jml_closing'))
                 ->leftjoin('users', 'notes.sales_Rep', '=', 'users.id')
                 ->groupByRaw('sales_rep')
                // ->select(DB::raw('((notes.sales_rep)) as sales,notes.Task_Status,users.Name_First'))
                 //    
                // ->select('notes.Task_Status','users.Name_First', DB::raw('COUNT(notes.Task_Status) as jml_closing'))
                 //->where('notes.Task_Status', '=', 2)  
                //->distinct()
                 ->get();
       
         return response()->json($result);
      }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
