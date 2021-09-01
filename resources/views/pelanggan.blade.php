@extends('layout.dashboard')

@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Target Marketing</h1>
        
	    </q><form action="/pelanggan/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pelanggan berdasarkan nama" value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	    </form>
          </div>


      <div class="table-responsive">
      @csrf
        <table  class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Status Cust</th>
             
              
              
            </tr>
          </thead>
          <tbody>
          @foreach($pelanggan as $cnt)
            <tr>
              <td>{{ $cnt->Contact_First}}</td>
              <td>{{ $cnt->Email}}</td>
              <td>{{ $cnt->Phone}}</td>
              <td><b>{{ $cnt->status}}</b></td>
            </tr> 
           @endforeach
          </tbody>
        </table>
      </div>

     
       @endsection