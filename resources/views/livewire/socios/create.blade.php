<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar una socio</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Nombre y apellidos
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('PK_ID_socio') is-invalid @enderror"
                        wire:model="PK_ID_socio">
                        <option selected>Personas</option>
                        @foreach($personas as $persona)
                            <option value="{{ $persona->PK_ID_persona }}">{{ $persona->NO_persona}} {{ $persona->AP_paterno_persona }} {{ $persona->AP_materno_persona }}</option>
                        @endforeach
                    </select>
                    @error('PK_ID_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Codigo
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('CO_socio') is-invalid @enderror"
                        wire:model="CO_socio" placeholder="">
                    @error('CO_socio')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Observaciones
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('DE_observaciones) is-invalid @enderror"
                        wire:model="DE_observaciones" placeholder="">
                    @error('DE_observaciones')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Estado
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('ES_socio') is-invalid @enderror"
                        wire:model="ES_socio">
                        <option selected>Estado</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
                    @error('ES_socio')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Departamento
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedDepartamento') is-invalid @enderror"
                        wire:model="selectedDepartamento">
                        <option selected>Seleccionar...</option>
                        @foreach($departamentos as $departamento)
                            <option value="{{ $departamento->PK_ID_departamento }}">{{ $departamento->PK_ID_departamento }}</option>
                        @endforeach
                    </select>
                    @error('selectedDepartamento')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @if (!is_null($selectedDepartamento))
                <div class="form-group col-6">
                    <label>Provincia
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedProvincia') is-invalid @enderror"
                        wire:model="selectedProvincia">
                        <option selected>Seleccionar...</option>
                        @foreach($provincias as $provincia)
                            <option value="{{ $provincia->PK_ID_provincia }}">{{ $provincia->NO_provincia }}</option>
                        @endforeach
                    </select>
                    @error('selectedProvincia')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @endif
                @if (!is_null($selectedProvincia))
                <div class="form-group col-6">
                    <label>Distrito
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedDistrito') is-invalid @enderror"
                        wire:model="selectedDistrito">
                        <option selected>Seleccionar...</option>
                        @foreach($distritos as $distrito)
                            <option value="{{ $distrito->PK_ID_distrito }}">{{ $distrito->NO_distrito }}</option>
                        @endforeach
                    </select>
                    @error('selectedDistrito')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @endif
                @if (!is_null($selectedDistrito))
                <div class="form-group col-6">
                    <label>Comunidad
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('selectedComunidad') is-invalid @enderror"
                        wire:model="selectedComunidad">
                        <option selected>Seleccionar...</option>
                        @foreach($comunidades as $comunidad)
                            <option value="{{ $comunidad->PK_ID_comunidad}}">{{ $comunidad->NO_comunidad }}</option>
                        @endforeach
                    </select>
                    @error('selectedComunidad')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                @endif
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('socios.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="create" type="button" wire:loading.attr="disabled"
                wire:target="create">
                Registrar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>