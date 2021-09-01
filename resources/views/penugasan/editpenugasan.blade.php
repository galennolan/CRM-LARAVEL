@extends('layout.dashboard')
@section('content')

    <form action="{{route('contact.update', [$contact->id])}}" method="POST">
   @csrf  

@method('PUT')
  <div class="form-row">
  <input type="hidden" name="kode[]" value="{{ $contact->id }}">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">First name</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="{{ $contact->Contact_First}}" required>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Phone</label>
      <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="{{ $contact->Phone}}" required>
    </div>
    
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="validationDefault03">Pilih Marketer</label>
      
      <select class="form-control" name="users_id" > 
      <option value="$users->Name_First"></option>
      @foreach ($users as $users)
          <option value="{{ $users->id }}" @if($contact->id == $users->id) selected @endif>{{$users->Name_First}}</option>
      @endforeach
      </select> 
      
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">State</label>
      <input type="text" class="form-control" id="validationDefault04" value="{{ $contact->Address}}" required>
    </div>
    
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
      <label class="form-check-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
    </div>
  </div>

  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
@endsection
