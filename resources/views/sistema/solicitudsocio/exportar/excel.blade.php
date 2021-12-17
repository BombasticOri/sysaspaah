<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado solicitud</th>
                <th>Fecha de ingreso</th>
                <th>ID/Persona</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
            <tr>
                <td>{{ $solicitud->PK_ID_sol_socio }}</td>
                <td>{{ $solicitud->NO_solicitante }}</td>
                <td>{{ $solicitud->AP_paterno_solicitante }}{{ $solicitud->AP_materno_solicitante }}</td>
                <td>
                    @if ($solicitud->ES_solicitud == '0')
                    Proceso
                    @elseif($solicitud->ES_solicitud == '1')
                    Aprobado
                    @else
                    No aprobado
                    @endif
                </td>
                <td>{{ $solicitud->FE_creado}}</td>
                <td>{{ $solicitud->FK_ID_persona}}, {{$solicitud->persona->NU_celular}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>