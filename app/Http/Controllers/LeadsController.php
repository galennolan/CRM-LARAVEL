<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Notes;

class LeadsController extends Controller
{
    public function index()
    {

        $data = DB::table('notes')
        ->leftJoin('users','users.id', '=','notes.Sales_Rep')
		->leftJoin('contact','contact.id', '=','notes.contact')
		->leftJoin('todo_desc','todo_desc.id', '=','notes.todo_Desc_ID')
		->leftJoin('todo_type','todo_type.id', '=','notes.todo_Type_ID')
		->where('contact.Status', '=', 1)  
        ->orderByRaw('notes.contact DESC')
        ->get();
       

        //return response()->json(compact('data'));
          return view ('leads.index',compact('data'));
    }
    public function edit($idu)
    {
        $notes=\App\Notes::findorFail($idu);
        $todo_desc = \App\todo_desc::all();
        $todo_type = \App\todo_type::all();
        return view ('leads.editleads',['notes'=>$notes,'todo_desc'=>$todo_desc,'todo_type'=>$todo_type]);
        
        //return response()->json([$notes,$todo_desc,$todo_type]);
    }

    public function update(Request $request, $id)
    {    
            
        notes::where('idu',$id)
        ->update([
            'notes' => $request->notes,
            'Todo_Due_Date' => $request->date,
            'Task_Status' => $request->status,

            
        ]);
        return redirect() ->route ('leads.index');
    }

    // method untuk menampilkan view form tambah pegawai
    public function show()
    {
        $notes = \App\Notes::all();
        $todo_desc = \App\todo_desc::all();
        $todo_type = \App\todo_type::all();
        $contact = \App\contact::All()->where('Status', '=', 1);
        $users = \App\users::All();

        $noUrutAkhir = \App\notes::max('idu');
        $formatnya= abs((int)$noUrutAkhir + 1);

        // memanggil view tambah
        return view('leads.tambahnotes',['formatnya'=>$formatnya,'users'=>$users,'contact'=>$contact,'todo_type'=>$todo_type,'todo_desc'=>$todo_desc,'notes'=>$notes]);
       // return response()->json([$notes,$todo_desc,$todo_type]);

    }

    // method untuk insert data ke table pegawai
    public function store(Request $request)
    {
        

        $originalDate = $request->date;
        $newDate = date("dd-mm-YYYY", strtotime($originalDate));
        // insert data ke table pegawai
        DB::table('notes')->insert([
            'idu' => $request->formatnya,
            'date' => $request->newDate,
            'Notes' => $request->notes,
            'Todo_Desc_ID' => $request->Todo_Desc_ID,
            'Todo_Type_ID' => $request->Todo_Type_ID,
            'Contact' => $request->Contact,
            'Sales_Rep' => $request->Sales_Rep
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/leads');

    }
}
