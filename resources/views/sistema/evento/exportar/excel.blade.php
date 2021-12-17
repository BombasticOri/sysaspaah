<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre evento</th>
                <th>Lugar</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->PK_ID_eventos }}</td>
                <td>{{ $evento->NO_eventos }}</td>
                <td>{{ $evento->NO_lugar }}</td>
                <td>{{ $evento->FE_inicio }}</td>
                <td>{{ $evento->FE_fin }}</td>
                <td>{{ $evento->DE_eventos }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>