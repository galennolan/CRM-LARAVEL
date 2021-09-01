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
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Status</th>
                 
                  
                </tr>
              </thead>
              <tbody>
                @foreach($data as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->Contact_First }}</td>
                  <td>{{ $row->Address }}</td>
                  <td>{{ $row->status }}</td>
       
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
    url:'{{ route("Ganticontact.action") }}',
    dataType:"json",
    columns:{
      identifier:[0, 'id'],
      editable:[[1, 'Contact_First'], [2, 'Address'], [3, 'Status', '{"1":"Cold", "2":"Warm","3":"Hot", "4":"Loyal"}']]
    },
    restoreButton:false,
    onSuccess:function(data, textStatus, jqXHR)
    {
      if(data.action == 'delete')
      {
        $('#'+data.id).remove();
      }
    }
  });

});  
</script>
