

<!DOCTYPE html>
<html>
<head>
    <title>Novedad</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.17/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body class="bg-dark">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title">Lista de Novedades 
                  <a class="btn btn-success ml-5" href="javascript:void(0)" id="createNewNove">Crear una nueva novedad</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Id usuario</th>
                        <th>Id ingreso</th>
                        <th>Tipo de novedad</th>
                        <th>Descripción de novedad</th>
                        <th>Responsable</th>
                     <!--<th width="15%">Acción</th>-->
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="ajaxModel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelHeading"></h4>
                    </div>
                    <div class="modal-body">
                        <form id="NoveForm" name="NoveForm" class="form-horizontal">
                           <input type="hidden" name="Id_nov" id="Id_nov">
                            <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Id usuario</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Id_usu" name="Id_usu" placeholder="Ingrese el id de usuario" value="" maxlength="50" required="">
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Id ingreso</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Id_ing" name="Id_ing" placeholder="Ingrese el id de ingreso" value="" maxlength="50" required="">
                                </div>   
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Tipo de novedad</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Tipo_nov" name="Tipo_nov" placeholder="Ingrese el Tipo de novedad" value="" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Descripcion de novedad</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Descripcion_nov" name="Descripcion_nov" placeholder="Ingrese descripción de la novedad" value="" maxlength="50" required="">
                                </div> 
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Responsable</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Responsable" name="Responsable" placeholder="Ingrese el responsable" value="" maxlength="50" required="">
                                </div> <br>
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Novedad
                             </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</body>
<script type="text/javascript">
  $(function () {
     
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('novedades.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Id_usu', name: 'Id_usu'},
            {data: 'Id_ing', name: 'Id_ing'},
            {data: 'Tipo_nov', name: 'Tipo_nov'},
            {data: 'Descripcion_nov', name: 'Descripcion_nov'},
            {data: 'Responsable', name: 'Responsable'},
           // {data: 'action', name: 'action', orderable: false, searchable: false},

        ], 
        
    language: {
        sProcessing:    "Procesando...",
        sLengthMenu:    "Novedades",
        sZeroRecords:   "No se encontraron resultados",
        sEmptyTable:    "Ningún dato disponible en esta tabla",
        sInfo:          "",
        sInfoEmpty:     "Mostrando registros del 0 al 0 de un total de 0 registros",
        sInfoFiltered:  "(filtrado de un total de MAX registros)",
        sInfoPostFix:   "",
        sSearch:        "Buscar:",
        sUrl:           "",
        sInfoThousands:  ",",
        sLoadingRecords: "Cargando...",
        oPaginate: {
            sFirst:    "Primero",
            sLast:    "Último",
            sNext:    "Siguiente",
            sPrevious: "Anterior"
        },
        oAria: {
            sSortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sSortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }

        
    });
     
    $('#createNewNove').click(function () {
        $('#saveBtn').val("create-Nove");
        $('#Id_nov').val('');
        $('#NoveForm').trigger("reset");
        $('#modelHeading').html("Crear una nueva Novedad");
        $('#ajaxModel').modal('show');
    });
    
    /*$('body').on('click', '.editNove', function () {
      var Id_nov = $(this).data('id');
      $.get("{{ route('novedades.index') }}" +'/' + Id_nov +'/edit', function (data) {
          $('#modelHeading').html("Editar Novedad");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Id_nov').val(data.Id_nov);
          $('#Id_usu').val(data.Id_usu);
          $('#Id_ing').val(data.Id_ing);
          $('#Tipo_nov').val(data.Tipo_nov);
          $('#Descripcion_nov').val(data.Descripcion_nov);
          $('#Responsable').val(data.Responsable);
      })
   });*/
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Guardando...');
    
        $.ajax({
          data: $('#NoveForm').serialize(),
          url: "{{ route('novedades.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#NoveForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('No se guardo correctamente:', data);
              $('#saveBtn').html('No se guardo correctamente');
          }
      });
    });
    
    /*$('body').on('click', '.deleteNove', function () {
     
        var Id_nov = $(this).data("id");
        confirm("¿Estas seguro que quieres eliminar?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('novedades.store') }}"+'/'+Id_nov,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });*/
     
  });
</script>
</html>

