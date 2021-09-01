<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Notes;

class OpportunitiesController extends Controller
{
    public function index()
    {
        $data = DB::table('notes')
        ->leftJoin('users','users.id', '=','notes.Sales_Rep')
		->leftJoin('contact','contact.id', '=','notes.contact')
		->leftJoin('todo_desc','todo_desc.id', '=','notes.todo_Desc_ID')
		->leftJoin('todo_type','todo_type.id', '=','notes.todo_Type_ID')
		->where('contact.Status', '=', 2)  
        ->orderByRaw('notes.contact DESC')
        ->get();
       

        //return response()->json(compact('data'));
          return view ('opportunities.index',compact('data'));
    }
    public function edit($idu)
    {
        $notes=\App\Notes::findorFail($idu);
        $todo_desc = \App\todo_desc::all();
        $todo_type = \App\todo_type::all();
        return view ('opportunities.edit',['notes'=>$notes,'todo_desc'=>$todo_desc,'todo_type'=>$todo_type]);
        //return response()->json([$contact,$contact_status]);
        //return response()->json([$notes,$todo_desc,$todo_type]);
    }

    public function update(Request $request, $id)
    {    
            
        notes::where('idu',$id)
        ->update([
            'notes' => $request->notes,
            'date' => $request->date,
            'Task_Status' => $request->status
            
        ]);
        return redirect() ->route ('opportunities.index');
    }

    // method untuk menampilkan view form tambah pegawai
    public function show()
    {
        $notes = \App\Notes::all();
        $todo_desc = \App\todo_desc::all();
        $todo_type = \App\todo_type::all();
        $contact = \App\contact::All()->where('Status', '=', 2);
        $users = \App\users::All();

        // memanggil view tambah
        return view('opportunities.tambahnotes',['users'=>$users,'contact'=>$contact,'todo_type'=>$todo_type,'todo_desc'=>$todo_desc,'notes'=>$notes]);
       // return response()->json([$notes,$todo_desc,$todo_type]);

    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        // insert data ke table pegawai
        DB::table('notes')->insert([
            'idu' => $request->id,
            'date' => $request->date,
            'Notes' => $request->notes,
            'Todo_Desc_ID' => $request->Todo_Desc_ID,
            'Todo_Type_ID' => $request->Todo_Type_ID,
            'Contact' => $request->Contact,
            'Sales_Rep' => $request->Sales_Rep
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/opportunities');

    }
}
