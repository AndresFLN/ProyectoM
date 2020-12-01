<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
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
                <h4 class="card-title">Lista de usuarios
                  <a class="btn btn-success ml-5" href="javascript:void(0)" id="createNewUsua">Crear un nuevo usuario</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Id_rol</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Identificación</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                       

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
                        <form id="UsuaForm" name="UsuaForm" class="form-horizontal">
                           <input type="hidden" name="Id_usu" id="Id_usu">
                           <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Id rol</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Id_rol" name="Id_rol" placeholder="Ingrese el id del rol" value="" maxlength="50" required="">
                                </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Nombre del usuario</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Nombre_usu" name="Nombre_usu" placeholder="Ingrese el Nombre del usuario" value="" maxlength="50" required="">
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Apellido del usuario</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Apellido_usu" name="Apellido_usu" placeholder="Ingrese el Apellido del usuario" value="" maxlength="50" required="">
                                </div>   
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Identificación del usuario</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Identificacion_usu" name="Identificacion_usu" placeholder="Ingrese la Identificación del usuario" value="" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Telefono del usuario</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Telefono_usu" name="Telefono_usu" placeholder="Ingrese el Telefono del usuario" value="" maxlength="50" required="">
                                </div> 
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Correo del usuario</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="Correo_usu" name="Correo_usu" placeholder="Ingrese el correo del usuario" value="" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Contraseña del usuario</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="Contrasena" name="Contrasena" placeholder="Ingrese la contraseña del usuario" value="" maxlength="50" required="">
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
        ajax: "{{ route('usuarios.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Id_rol', name: 'Id_rol'},
            {data: 'Nombre_usu', name: 'Nombre_usu'},
            {data: 'Apellido_usu', name: 'Apellido_usu'},
            {data: 'Identificacion_usu', name: 'Identificacion_usu'},
            {data: 'Telefono_usu', name: 'Telefono_usu'},
            {data: 'Correo_usu', name: 'Correo_usu'},
         
           // {data: 'action', name: 'action', orderable: false, searchable: false},

        ], 
        
    language: {
        sProcessing:    "Procesando...",
        sLengthMenu:    "Lista de usuarios",
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
     
    $('#createNewUsua').click(function () {
        $('#saveBtn').val("create-Usua");
        $('#Id_usu').val('');
        $('#UsuaForm').trigger("reset");
        $('#modelHeading').html("Crear un nuevo usuario");
        $('#ajaxModel').modal('show');
    });
    
    /*$('body').on('click', '.editUsua', function () {
      var Id_usu = $(this).data('id');
      $.get("{{ route('usuarios.index') }}" +'/' + Id_usu +'/edit', function (data) {
          $('#modelHeading').html("Editar usuario");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Id_usu').val(data.Id_usu);
          $('#Id_rol').val(data.Id_rol);
          $('#Nombre_usu').val(data.Nombre_usu);
          $('#Apellido_usu').val(data.Apellido_usu);
          $('#Identificacion_usu').val(data.Identificacion_usu);
          $('#Telefono_usu').val(data.Telefono_usu);
          $('#Correo_usu').val(data.Correo_usu);
          $('#Contrasena').val(data.Contrasena);
        
      })
   });*/
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Guardando..');
    
        $.ajax({
          data: $('#UsuaForm').serialize(),
          url: "{{ route('usuarios.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#UsuaForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('No se guardo correctamente:', data);
              $('#saveBtn').html('No se guardo correctamente');
          }
      });
    });
    
   /* $('body').on('click', '.deleteUsua', function () {
     
        var Id_usu = $(this).data("id");
        confirm("¿Estas seguro que quieres eliminar?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('usuarios.store') }}"+'/'+Id_usu,
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
