@extends('layout.dashboard')
@section('content')

   <form action="{{route('won.update', [$notes->idu])}}" method="POST">
   @csrf  

@method('PUT')
  <div class="form-row">
  <input type="hidden" name="kode[]" value="{{ $notes->idu }}">
    <div class="col-md-4 mb-3">
      <label for="validationDefault01">Notes</label>
      <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="{{ $notes->Notes}} "name="notes" required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationDefault02">Tanggal</label>
      <input type="date" class="form-control" id="validationDefault02" placeholder="Last name" value="{{ $notes->Date}}" name="date" required>
    </div>

    <div class="col-md-4 mb-3">
    <label for="validationDefault03">Deskripsi  : {{$notes->todo_desc->description }}</label>
    </div>
    
    <div class="col-md-3 mb-3">
      <label for="validationDefault04">Status</label>

      <select id="status" name="status" class="form-control" required>
      <option value="">--Pilih Status--</option>
      <option value="Completed">Completed</option>
      <option value="Pending">Pending</option>
      </select>

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
