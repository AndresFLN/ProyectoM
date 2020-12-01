<!DOCTYPE html>
<html>
<head>
    <title>Vehiculo</title>
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
                <h4 class="card-title">Lista de Vehiculos 
                  <a class="btn btn-success ml-5" href="javascript:void(0)" id="createNewVehi">Crear un nuevo vehiculo</a>
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
                        <th>Razon de entrada</th>
                        <th>Placas</th>
                        <th>Tipo de vehiculo</th>
                        <th>Estado del vehiculo</th>


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
                        <form id="VehiForm" name="VehiForm" class="form-horizontal">
                           <input type="hidden" name="Id_veh" id="Id_veh">
                            <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Nombre del Conductor</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Nombre_con" name="Nombre_con" placeholder="Ingrese el Nombre del Conductor" maxlength="50" required="">
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Apellido del Conductor</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Apellido_con" name="Apellido_con" placeholder="Ingrese el Apellido del Conductor" maxlength="50" required="">
                                </div>   
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Identificación del Conductor</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Identificacion_con" name="Identificacion_con" placeholder="Ingrese la Identificación del Conductor" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Telefono del Conductor</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Telefono_con" name="Telefono_con" placeholder="Ingrese el Telefono del Conductor" maxlength="50" required="">
                                </div> 
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Razon de Entrada</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Razon_de_entrada_con" name="Razon_de_entrada_con" placeholder="Ingrese la Razon del Entrada" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Placas del Vehiculo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Placas" name="Placas" placeholder="Ingrese las placas del Vehiculo" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Tipo del vehiculo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Tipo_veh" name="Tipo_veh" placeholder="Ingrese el tipo del Vehiculo" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Estado del Vehiculo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Estado_veh" name="Estado_veh" placeholder="Ingrese el Estado del Vehiculo" maxlength="50" required="">
                                </div>  <br>      
                            <div class="col-sm-offset-2 col-sm-10">
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
        ajax: "{{ route('vehiculos.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Nombre_con', name: 'Nombre_con'},
            {data: 'Apellido_con', name: 'Apellido_con'},
            {data: 'Identificacion_con', name: 'Identificacion_con'},
            {data: 'Razon_de_entrada_con', name: 'Razon_de_entrada_con'},
            {data: 'Placas', name: 'Placas'},
            {data: 'Tipo_veh', name: 'Tipo_veh'},
            {data: 'Estado_veh', name: 'Estado_veh'},
           // {data: 'action', name: 'action', orderable: false, searchable: false},

        ], 
        
    language: {
        sProcessing:    "Procesando...",
        sLengthMenu:    "Lista de Vehiculos",
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
     
    $('#createNewVehi').click(function () {
        $('#saveBtn').val("create-Vehi");
        $('#Id_veh').val('');
        $('#VehiForm').trigger("reset");
        $('#modelHeading').html("Crear un nuevo Vehiculo");
        $('#ajaxModel').modal('show');
    });
    
   /* $('body').on('click', '.editVehi', function () {
      var Id_veh = $(this).data('id');
      $.get("{{ route('vehiculos.index') }}" +'/' + Id_veh +'/edit', function (data) {
          $('#modelHeading').html("Editar Vehiculo");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Id_veh').val(data.Id_veh);
          $('#Nombre_con').val(data.Nombre_con);
          $('#Apellido_con').val(data.Apellido_con);
          $('#Identificacion_con').val(data.Identificacion_con);
          $('#Telefono_con').val(data.Telefono_con);
          $('#Razon_de_entrada_con').val(data.Razon_de_entrada_con);
          $('#Placas').val(data.Placas);
          $('#Tipo_veh').val(data.Tipo_veh);
          $('#Estado_veh').val(data.Estado_veh);
      })
   });*/
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Guardando..');
    
        $.ajax({
          data: $('#VehiForm').serialize(),
          url: "{{ route('vehiculos.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#VehiForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error', data);
              $('#saveBtn').html('No se guardo correctamente');
          }
      });
    });
    
   /* $('body').on('click', '.deleteVehi', function () {
     
        var Id_veh = $(this).data("id");
        confirm("¿Estas seguro que quieres eliminar?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('vehiculos.store') }}"+'/'+Id_veh,
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
