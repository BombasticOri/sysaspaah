<div>
    <div class="mb-3 d-flex justify-content-between row">
        <div class="col-8">
            <x-jet-input placeholder="Buscar solicitud" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-4">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0">Nombres</option>
                    <option value="1">Apellidos</option>
                    <option value="2">Proceso</option>
                    <option value="3">Aprobado</option>
                    <option value="4">No aprobado</option>
                    <option value="5" selected>ID</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-danger px-4" href="{{route('solicitudsocios.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('solicitudsocios.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>

        <a class="btn btn-secondary" href="{{route('solicitudsocios.create')}}">
            <i class="far fa-file"></i> Registrar solicitud
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Estado</th>
                <th>Fecha Creado</th>
                <th>ID/Telefono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitudes as $solicitud)
            <tr class="text-center">
                <td>{{ $solicitud->PK_ID_sol_socio }}</td>
                <td>{{ $solicitud->NO_solicitante }}</td>
                <td>{{ $solicitud->AP_paterno_solicitante }} {{ $solicitud->AP_materno_solicitante }}</td>
                <td>
                    @if ($solicitud->ES_solicitud == '0')
                    <i class="fas fa-question text-primary fa-2x"></i>
                    @elseif($solicitud->ES_solicitud == '1')
                    <i class="fas fa-check-circle text-success fa-2x"></i>
                    @else
                    <i class="fas fa-times-circle text-danger fa-2x"></i>
                    @endif
                </td>
                <td>{{ $solicitud->FE_creado }}</td>
                <td>{{ $solicitud->FK_ID_persona }}, {{$solicitud->persona->NU_celular}}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('solicitudsocios.edit', $solicitud->PK_ID_sol_socio)}}" type="button"
                            class="btn btn-primary"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $solicitud->PK_ID_sol_socio }})"
                            class="btn btn-danger btn-sm">Eliminar</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($links->links())
        {{$links->links()}}
        @endif
    </div>
</div>