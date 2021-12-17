<div class="container">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Editar Solicitud</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Nombres
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('NO_solicitante') is-invalid @enderror"
                        wire:model="NO_solicitante" placeholder="">
                    @error('NO_solicitante')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido paterno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('AP_paterno_solicitante') is-invalid @enderror"
                        wire:model="AP_paterno_solicitante" placeholder="">
                    @error('AP_paterno_solicitante')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido materno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('AP_materno_solicitante') is-invalid @enderror"
                        wire:model="AP_materno_solicitante" placeholder="">
                    @error('AP_materno_solicitante')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Estado
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('ES_solicitud') is-invalid @enderror"
                        wire:model="ES_solicitud">
                        <option selected>Estado</option>
                        <option value="0">Proceso</option>
                        <option value="1">Aprobado</option>
                        <option value="2">No aprobado</option>
                    </select>
                    @error('ES_solicitud')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Fecha creado
                        <code>*</code></label>
                    <input type="date"
                        class="form-control form-control-border border-width-2 @error('FE_creado') is-invalid @enderror"
                        wire:model="FE_creado" placeholder="">
                    @error('FE_creado')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>ID/Telefono
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('FK_ID_persona') is-invalid @enderror"
                        wire:model="FK_ID_persona">
                        <option selected>Personas</option>
                        @foreach($personas as $persona)
                            <option value="{{ $persona->PK_ID_persona }}">{{ $persona->PK_ID_persona }}, {{ $persona->NU_celular }}</option>
                        @endforeach
                    </select>
                    @error('FK_ID_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger btn-block" href="{{route('solicitudsocios.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="edit" type="button" wire:loading.attr="disabled"
             wire:target="update">
                Registrar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>
