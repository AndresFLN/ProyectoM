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
