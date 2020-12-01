

<!DOCTYPE html>
<html>
<head>
    <title>Ingreso</title>
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
                <h4 class="card-title">Lista de ingresos </h4>
                <a class="btn btn-success " href="javascript:void(0)" id="createNewElem">Crear un nuevo elemento</a>
            </div>
         </div>
         <div class="card-body">
             <a href="/Exportar/Producto" class="btn btn-info">Descargar excel</a>
           <table id="myTable" class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Visitante</th>
                        <th>Elemento</th>
                        <th>Usuario</th>
                        <th>Vehiculo</th>
                        <th>Fecha de entrada</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ingresos as $ing)
                <tr>
                <td>{{$ing->Id_ing}}</td>
                @foreach($visitantes as $visis)
                @if($ing->Id_vis == $visis->Id_vis)
                 <td>{{$visis->Nombre_vis}}</td>
                @endif
                @endforeach
                @foreach($elementos as $elem)
                @if($ing->Id_ele == $elem->Id_ele)
                 <td>{{$elem->Tipo_ele}}</td>
                @endif
                @endforeach
                @foreach($usuarios as $usu)
                @if($ing->Id_usu == $usu->Id_usu)
                 <td>{{$usu->Nombre_usu}}</td>
                @endif
                @endforeach
                @foreach($vehiculos as $veh)
                @if($ing->Id_veh == $veh->Id_veh)
                  <td>{{$veh->Tipo_veh}}</td>
                @endif
                @endforeach
                    <td>{{ $ing->Fecha_y_hora_de_entrada }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
     </div>
   </div>
 </div>
     <div class="modal fade" id="ajaxModel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="modelHeading"></h4>
                 </div>
                 <div class="modal-body">
                     <form id="ElemForm" method="post" action="/Guardar/Ingreso"  class="form-horizontal">
                         @csrf
                         <div class="form-group">
                             <label for="name" class="col-sm-6 control-label">Visitante</label>
                             <div class="col-sm-12">
                                 <select id="Visitante_id" name="Visitante_id" class="form-control" required>
                                     <option value="">Selecccione una opcion</option>
                                     @foreach($visitantes as $visis)
                                         <option value="{{$visis->Id_vis}}">{{$visis->Nombre_vis}}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-group">
                             <label for="name" class="col-sm-6 control-label">Tipo de elemento</label>
                             <div class="col-sm-12">
                                 <select id="Elemento_id" name="Elemento_id" class="form-control" required>
                                     <option value="">Selecccione una opcion</option>
                                     @foreach($elementos as $elem)
                                         <option value="{{$elem->Id_ele}}">{{$elem->Tipo_ele}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group">
                                 <label for="name" class="col-sm-6 control-label">Usuario</label>
                                 <div class="col-sm-12">
                                     <select id="Usuario_id" name="Usuario_id" class="form-control" required>
                                         <option value="">Selecccione una opcion</option>
                                         @foreach($usuarios as $usu)
                                             <option value="{{$usu->Id_usu}}">{{$usu->Nombre_usu}}</option>
                                         @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="name" class="col-sm-6 control-label">Vehiculo</label>
                                     <div class="col-sm-12">
                                         <select id="Vehiculo_id" name="Vehiculo_id" class="form-control" required>
                                             <option value="">Selecccione una opcion</option>
                                             @foreach($vehiculos as $veh)
                                                 <option value="{{$veh->Id_veh}}">{{$veh->Tipo_veh}}</option>
                                             @endforeach
                                         </select>
                                     </div>   <br>
                                     <div class="col-sm-offset-2 col-sm-10">
                                         <button type="submit" class="btn btn-primary" id="saveBtn" >Guardar Cambios
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
</body>
<script type="text/javascript">
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {
            $('#myTable').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
        });
        $('#createNewElem').click(function () {
            $('#saveBtn').val("create-Elem");
            $('#Id_ele').val('');
            $('#ElemForm').trigger("reset");
            $('#modelHeading').html("Crear un nuevo Elemento");
            $('#ajaxModel').modal('show');
        });
    });
</script>
</html>

