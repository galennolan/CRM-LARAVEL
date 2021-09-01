@extends('layout.dashboard')

@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penugasan Marketer</h1>
      </div>
      

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th>ID</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Produk terakhir yg dibeli</th>
              <th>Tombol</th>
            </tr>
          </thead>
          <tbody>
          @csrf
          @foreach($contact as $cnt)
            <tr>
            <td>{{ $cnt->id}}</td>
              <td>{{ $cnt->Contact_First}}</td>
              <td>{{ $cnt->Email}}</td>
              <td>{{ $cnt->Phone}}</td>
              <td><select name="akun[]" id="stat" class="form-control"  width="80%">
              <option value="">Status Cust</option>
              @foreach ($contact_status as $cnta)
              <option value="{{ $cnt->status }}">{{ $cnta->id }}  </option>
              @endforeach
              </select></td>
                <td><a href="{{route('contact.edit',[$cnt->id])}}"class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">  <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
              </td>
            </tr> 
           @endforeach
          </tbody>
        </table>
        
      </div>
       @endsection