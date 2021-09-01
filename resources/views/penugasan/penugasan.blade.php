@extends('layout.dashboard')
@section('content')
@include('sweetalert::alert')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Setting Akun untuk transaksi </h1>
</div>
<hr>
<form action="/penugasan/simpan" method="POST">
 @csrf
 @foreach ($notes as $notes)
 <div class="row col-sm-6">
 <div class="col-sm">
 <input type="hidden" name="kode[]" value="{{ $notes->idu }}">
 <label for="exampleFormControlInput1">Transaksi {{ $notes->Task_Status}} </label>
 </div>
 <div class="col-sm">
 <label for="exampleFormControlInput1">{{ $notes->Date }}</label>
 </div>
 <div class="col-sm">
 <select name="users[]" id="supp select2" class="form-control" required width="100%">

 </select>
 </div>
 </div>
 @endforeach
 <input type="submit" class="btn btn-primary btn-send" value="Update Setting ">
</form>
@endsection
