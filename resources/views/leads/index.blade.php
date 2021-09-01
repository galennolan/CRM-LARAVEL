@extends('layout.dashboard')

@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pelanggan  <b><span class="text-primary">Cold</span></b></h1>\
        
		
		<a href="leads/tambah/"><li data-feather="user-plus"></li>Tambah</a>
	    
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            
            <th>idN</th>
            <th>ID</th>
              <th>Pelanggan</th>
              <th>Marketer</th>
              <th>Type</th>
              <th>Description</th>
              <th>Status</th>
              <th>Contact</th>
              <th>Date</th>
              <th>Notes</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          @csrf
          @foreach($data as $cnt)
            <tr>
            <td>{{ $cnt->idu}}</td>
            <td>{{ $cnt->id}}</td>
              <td>{{ $cnt->Contact_First}}</td>
              <td>{{ $cnt->Name_First}}</td>
              <td>{{ $cnt->type}}</td>
              <td>{{ $cnt->description}}</td>
              <td class="text-success">{{ $cnt->Task_Status}}</td>
              <td><a href="mailto:{{ $cnt->Email}}"><li data-feather="mail"></li><a href="tel:{{ $cnt->Phone}}"> <li  data-feather="phone-forwarded"></li></td>
              <td>{{$cnt->Todo_Due_Date}}</td>
              <td>{{ $cnt->Notes}}</td>
              <td><a href="{{route('leads.edit',[$cnt->idu])}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">  <li class="nav-item" data-feather="edit"></li></a>
              </td>
            </tr> 
            
          
           @endforeach
          </tbody>
        </table>
        
      </div>

       @endsection