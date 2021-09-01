<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Table Edit Delete Mysql Data using Tabledit Plugin in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
  </head>
  <body>
    <div class="container">
      <br />
      <h3 align="center">Status Marketingan </h3> <a class="nav-link active" aria-current="page" href="{{url ('/test')}}">  
              Home
            </a>
      <br />
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">   Data</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            @csrf
            <table id="editable" class="table table-bordered table-striped ">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>tanggal</th>
                  <th>Catatan</th>
                  <th>Status</th>
                  <th>Marketer</th>
                  <th>Pelanggan</th>
                  <th>Deskripsi</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{ $row->idu }}</td>
                  <td>{{ $row->Date }}</td>
                  <td>{{ $row->Notes }}</td>
                  <td>{{ $row->Task_Status }}</td>
                  <td>{{ $row->Name_First }}</td>
                  <td>{{ $row->Contact_First }}</td>
                  <td>{{ $row->description }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
   
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token' : $("input[name=_token]").val()
    }
  });

  $('#editable').Tabledit({
    url:'{{ route("Statusall.action") }}',
    dataType:"json",
    columns:{
      identifier:[0, 'idu'],
      editable:[[1, 'date'], [2, 'notes'], [3, 'Task_Status', '{"1":"Completed", "2":"Pending"}']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
      if(data.action == 'delete')
      {
        $('#'+data.idu).remove();
      }
    }
  });

});  
</script>
