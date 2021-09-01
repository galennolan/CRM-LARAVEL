<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Exports\ContactExport;
use App\Imports\ContactImport;
use Maatwebsite\Excel\Facades\Excel;
use Alert;
  
class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new ContactExport, 'contact.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new ContactImport,request()->file('file'));
        Alert::success('Pesan ','Data berhasil disimpan');     
        return back();
       
    }
}