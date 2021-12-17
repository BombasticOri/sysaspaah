<div>
    <div class="mb-3 d-flex justify-content-center row">
        <div class="col-4">
            <x-jet-input placeholder="Buscar socio" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-2">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0">Seleccione</option>
                    <option value="1" selected>Socio</option>
                    <option value="2">Comunidad</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-warning px-4" href="{{route('socios.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('socios.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>
        <a class="btn btn-success" href="{{route('socios.create')}}">
            <i class="fas fa-plus mr-1"></i> Registrar socio
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI</th>
                <th>Codigo</th>
                <th>Observaciones</th>
                <th>Estado</th>
                <th>Comunidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socios as $socio)
            <tr class="text-center">
                <td>{{ $socio->ID_SOCIO }}</td>
                <td>{{ $socio->persona->NO_persona }}</td>
                <td>{{ $socio->persona->AP_paterno_persona }}{{ $socio->persona->AP_materno_persona }}</td>
                <td>{{ $socio->persona->NU_dni }}</td>
                <td>{{ $socio->CO_socio }}</td>
                <td>{{ $socio->DE_observaciones }}</td>
                <td>
                    @if ($socio->ES_socio == '1')
                    <i class="fas fa-thumbs-up fa-lg text-success"></i>
                    @else
                    <i class="fas fa-thumbs-down fa-lg text-danger"></i>
                    @endif
                </td>
                <td>{{ $socio->comunidad->NO_comunidad }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('sistema.socio.exportar.pdfCatnet', $socio->PK_ID_socio)}}"
                            type="button" class="btn btn-primary"><i class="align-middle" data-feather="eye"></i>
                            Carnet</a>
                        <a href="{{route('socios.edit', $socio->PK_ID_socio)}}" type="button"
                            class="btn btn-primary"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $solio->PK_ID_socio }})"
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
