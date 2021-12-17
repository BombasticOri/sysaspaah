<div>
    <div class="mb-3 d-flex justify-content-between row">
        <div class="col-8">
            <x-jet-input placeholder="Buscar evento" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-4">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0">ID</option>
                    <option value="1">Nombre evento</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-danger px-4" href="{{route('eventos.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('eventos.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>

        <a class="btn btn-secondary" href="{{route('eventos.create')}}">
            <i class="far fa-file"></i> Registrar evento
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Nombre evento</th>
                <th>Nombre lugar</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
                <th>Descripcion eventos</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventos as $evento)
            <tr class="text-center">
                <td>{{ $evento->PK_ID_eventos }}</td>
                <td>{{ $evento->NO_eventos }}</td>
                <td>{{ $evento->NO_lugar }}</td>
                <td>{{ $evento->FE_inicio }}</td>
                <td>{{ $evento->FE_fin }}</td>
                <td>{{ $evento->DE_eventos }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('eventos.edit', $evento->PK_ID_eventos)}}" type="button"
                            class="btn btn-primary"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $evento->PK_ID_eventos }})"
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