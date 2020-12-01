
<!DOCTYPE html>
<html>
<head>
    <title>Elemento</title>
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
                <h4 class="card-title">Lista de Elementos
                  <a class="btn btn-success ml-5" href="javascript:void(0)" id="createNewElem">Crear un nuevo elemento</a>
                </h4>
            </div>
         </div>
         <div class="card-body">
           <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th>Marca del elemento</th>
                        <th>Valoración del elemento</th>
                        <th>Estado del elemento</th>
                        <th>Tipo del elemento</th>
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
                        <form id="ElemForm" name="ElemForm" class="form-horizontal">
                           <input type="hidden" name="Id_ele" id="Id_ele">
                            <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Marca del elemento</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Marca_ele" name="Marca_ele" placeholder="Ingrese la Marca del elemento" value="" maxlength="50" required="">
                                </div>
                            </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Valoración del elemento</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="Valoracion_ele" name="Valoracion_ele" placeholder="Ingrese la Valoración del elemento" value="" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Estado del elemento</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Estado_ele" name="Estado_ele" placeholder="Ingrese el Estado del elemento" value="" maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                <label for="name" class="col-sm-6 control-label">Tipo del elemento</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="Tipo_ele" name="Tipo_ele" placeholder="Ingrese el Tipo del elemento" value="" maxlength="50" required="">
                                </div>   <br>
                            <div class="col-sm-offset-2 col-sm-10">
                             <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar Cambios
                             </button>
                            </div>
                                </div>
                                </div>
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
        ajax: "{{ route('elementos.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Marca_ele', name: 'Marca_ele'},
            {data: 'Valoracion_ele', name: 'Valoracion_ele'},
            {data: 'Estado_ele', name: 'Estado_ele'},
            {data: 'Tipo_ele', name: 'Tipo_ele'},
           // {data: 'action', name: 'action', orderable: false, searchable: false},

        ],

    language: {
        sProcessing:    "Procesando...",
        sLengthMenu:    "Elementos",
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

    $('#createNewElem').click(function () {
        $('#saveBtn').val("create-Elem");
        $('#Id_ele').val('');
        $('#ElemForm').trigger("reset");
        $('#modelHeading').html("Crear un nuevo Elemento");
        $('#ajaxModel').modal('show');
    });

   /* $('body').on('click', '.editElem', function () {
      var Id_ele = $(this).data('id');
      $.get("{{ route('elementos.index') }}" +'/' + Id_ele +'/edit', function (data) {
          $('#modelHeading').html("Editar Elemento");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#Id_ele').val(data.Id_ele);
          $('#Marca_ele').val(data.Marca_ele);
          $('#Valoracion_ele').val(data.Valoracion_ele);
          $('#Estado_ele').val(data.Estado_ele);
          $('#Tipo_ele').val(data.Tipo_ele);
      })
   });*/

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
          data: $('#ElemForm').serialize(),
          url: "{{ route('elementos.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {

              $('#ElemForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();

          },
          error: function (data) {
              console.log('No se guardo correctamente:', data);
              $('#saveBtn').html('No se guardo correctamente');
          }
      });
    });

   /* $('body').on('click', '.deleteElem', function () {

        var Id_ele = $(this).data("id");
        confirm("¿Estas seguro que quieres eliminar?");

        $.ajax({
            type: "DELETE",
            url: "{{ route('elementos.store') }}"+'/'+Id_ele,
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

