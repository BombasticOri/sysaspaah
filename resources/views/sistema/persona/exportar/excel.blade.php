<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Sexo</th>
                <th>DNI</th>
                <th>Número celular</th>
                <th>Dirección</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personas as $persona)
            <tr>
                <td>{{ $persona->PK_ID_persona }}</td>
                <td>{{ $persona->NO_persona }}</td>
                <td>{{ $persona->AP_paterno_persona }} {{ $persona->AP_materno_persona }}</td>
                <td>
                    @if ($persona->TI_sexo == '1')
                    Masculino
                    @else
                    Femenino
                    @endif
                </td>
                <td>{{ $persona->NU_dni }}</td>
                <td>{{ $persona->NU_celular }}</td>
                <td>{{ $persona->DI_persona }}</td>
                <td>{{ $persona->IM_persona}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>