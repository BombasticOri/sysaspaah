<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres y apellidos</th>
                <th>CO_socio</th>
                <th>DE_observaciones</th>
                <th>ES_socio</th>
                <th>FK_ID_comunidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socios as $socio)
            <tr>
                <td>{{ $socio->PK_ID_socio }}</td>
                <td>{{ $socio->persona->NO_persona }}{{ $socio->persona->AP_materno_persona }}{{ $socio->persona->AP_paterno_persona}}</td>
                <td>{{ $socio->CO_socio }}</td>
                <td>{{ $socio->DE_observaciones}}</td>
                <td>
                    @if ($socio>ES_socio == '1')
                    Activo
                    @else
                    Inactivo
                    @endif
                </td>
                <td>{{ $socio->FK_ID_comunidad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>