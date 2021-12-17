<div>
    <div class="mb-3 d-flex justify-content-between row">
        <div class="col-8">
            <x-jet-input placeholder="Buscar persona" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-4">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0">Seleccione un filtro</option>
                    <option value="1">Nombres y apellidos</option>
                    <option value="2">DNI</option>
                    <option value="3" selected>ID</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-danger px-4" href="{{route('personas.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('personas.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>

        <a class="btn btn-secondary" href="{{route('personas.create')}}">
            <i class="fas fa-user-plus"></i> Registrar persona
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Sexo</th>
                <th>Número de DNI</th>
                <th>Número de celular</th>
                <th>Dirección</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
            <tr class="text-center">
                <td>{{ $persona->PK_ID_persona }}</td>
                <td>{{ $persona->NO_persona }}</td>
                <td>{{ $persona->AP_paterno_persona }} {{ $persona->AP_materno_persona }}</td>
                <td>
                    @if ($persona->TI_sexo == '1')
                    <i class="fas fa-male text-primary fa-2x"></i>
                    @else
                    <i class="fas fa-female text-danger fa-2x"></i>
                    @endif
                </td>
                <td>{{ $persona->NU_dni }}</td>
                <td>{{ $persona->NU_celular }}</td>
                <td>{{ $persona->DI_persona }}</td>
                <td>{{ $persona->IM_persona }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('personas.edit', $persona->PK_ID_persona)}}" type="button"
                            class="btn btn-primary"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $persona->PK_ID_persona }})"
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
