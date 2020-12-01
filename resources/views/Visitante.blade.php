<!DOCTYPE html>
<html>
<head>
    <title>Visitante</title>
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
    <script src="dist/js/script.js"></script>
</head>
<body class="bg-dark">
 <div class="container">
   <div class="row">
     <div class="col-md-12">
       <div class="card mt-5">
         <div class="card-header">
            <div class="col-md-12">
                <h4 class="card-title">Lista de visitantes
                  <a class="btn btn-success ml-5" href="javascript:void(0)" id="createNewVisi">Crear un nuevo visitante</a>
                </h4>
            </div>
         </div>
         
         <div class="card-body">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Identificación</th>
                        <th>Telefono</th>
                        <th>Razon de entrada</th>
                       

                       <!-- <th width="15%">Acción</th>-->
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
                        <form id="VisiForm" name="VisiForm" class="form-horizontal">
                           <input type="hidden" name="Id_vis" id="Id_vis">
                            <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Nombre del visitante</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Nombre_vis" name="Nombre_vis" placeholder="Ingrese el Nombre del visitante"  maxlength="50" required>
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Apellido del visitante</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Apellido_vis" name="Apellido_vis" placeholder="Ingrese el Apellido del visitante"  maxlength="50" required>
                                </div>   
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Identificación del visitante</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Identificacion_vis" name="Identificacion_vis" placeholder="Ingrese la Identificación del visitante"  maxlength="50" required>
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Telefono del visitante</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Telefono_vis" name="Telefono_vis" placeholder="Ingrese el Telefono del visitante"  maxlength="50" required>
                                </div> 
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Razon de Entrada</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Razon_de_entrada" name="Razon_de_entrada" placeholder="Ingrese la Razon del Entrada"  maxlength="50" required>
                                </div>
                                      
                                <br> <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Cambios
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
        ajax: "{{ route('visitantes.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Nombre_vis', name: 'Nombre_vis'},
            {data: 'Apellido_vis', name: 'Apellido_vis'},
            {data: 'Identificacion_vis', name: 'Identificacion_vis'},
            {data: 'Telefono_vis', name: 'Telefono_vis'},
            {data: 'Razon_de_entrada', name: 'Razon_de_entrada'},
            //{data: 'action', name: 'action', orderable: false, searchable: false},

        ], 
        
    language: {
        sProcessing:    "Procesando...",
        sLengthMenu:    "Lista de visitantes",
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
     
    $('#createNewVisi').click(function () {
        $('#saveBtn').val("create-Visi");
        $('#Id_vis').val('');
        $('#VisiForm').trigger("reset");
        $('#modelHeading').html("Crear un nuevo visitante");
        $('#ajaxModel').modal('show');
    });
    
   /* $('body').on('click', '.editVisi', function () {
      var Id_vis = $(this).data('id');
      $.get("{{ route('visitantes.index') }}" +'/' + Id_vis +'/edit', function (data) {
          $('#modelHeading').html("Editar visitante");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Id_vis').val(data.Id_vis);
          $('#Nombre_vis').val(data.Nombre_vis);
          $('#Apellido_vis').val(data.Apellido_vis);
          $('#Identificacion_vis').val(data.Identificacion_vis);
          $('#Telefono_vis').val(data.Telefono_vis);
          $('#Razon_de_entrada').val(data.Razon_de_entrada);
        
      })
   });*/
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Guardando..');
    
        $.ajax({
          data: $('#VisiForm').serialize(),
          url: "{{ route('visitantes.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#VisiForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
            
              console.log('No se guardo correctamente:', data);
              $('#saveBtn').html('No se guardo correctamente datos duplicados');
          }
      });
    });
    
   /* $('body').on('click', '.deleteVisi', function () {
     
        var Id_vis = $(this).data("id");
        confirm("¿Estas seguro que quieres eliminar?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('visitantes.store') }}"+'/'+Id_vis,
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
