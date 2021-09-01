@extends('layout.dashboard')
@section('content')

   <form action="/opportunities/store" method="post">
    {{ csrf_field() }}
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">ID</label>
      <input type="text" class="form-control" id="validationDefault01" name="id"  value="{{ $formatnya }}">
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Tanggal</label>
      <input type="date" class="form-control" id="validationDefault02" name="date" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Notes</label>
      <input type="text" class="form-control" id="validationDefault02" name="notes" required>
    </div>

    <div class="col-md-4 mb-3">
    <label for="validationDefault03">Deskripsi</label>
      
      <select class="form-control" name="Todo_Desc_ID" > 
      <option value="$todo_desc->description"></option>
      @foreach ($todo_desc as $tododesc)
          <option value="{{ $tododesc->id }}" @if($tododesc->id == $tododesc->id) selected @endif>{{$tododesc->description}}</option>
      @endforeach
      </select> 

    </div>
    
  <div class="form-row">
    <div class="col-md-6 mb-3">
    <label for="validationDefault03">Tugas</label>
      
      <select class="form-control" name="Todo_Type_ID" > 
      <option value="$todo_type->type"></option>
      @foreach ($todo_type as $todotype)
          <option value="{{ $todotype->id }}" @if($todotype->id == $todotype->id) selected @endif>{{$todotype->type}}</option>
      @endforeach
      </select> 

      
    </div>
    <div class="col-md-3 mb-3">
    <label for="validationDefault03">Nama Pelanggan</label>
    <select class="form-control" name="Contact" > 
      <option value="$contact->Contact_First"></option>
      @foreach ($contact as $contact)
          <option value="{{ $contact->id }}" @if($contact->id == $contact->id) selected @endif>{{$contact->Contact_First}}</option>
      @endforeach
      </select> 
    </div>

    <div class="col-md-3 mb-3">
    <label for="validationDefault03">Nama Marketer</label>
    <select class="form-control" name="Sales_Rep" > 
      <option value="$users->Name_First"></option>
      @foreach ($users as $users)
          <option value="{{ $users->id }}" @if($users->id == $contact->id) selected @endif>{{$users->Name_First}}</option>
      @endforeach
      </select> 
    </div>
    
  </div>
 

  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
@endsection
