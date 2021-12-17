<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Editar Persona</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Nombres
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('NO_persona') is-invalid @enderror"
                        wire:model="NO_persona" placeholder="">
                    @error('NO_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido paterno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('AP_paterno_persona') is-invalid @enderror"
                        wire:model="AP_paterno_persona" placeholder="">
                    @error('AP_paterno_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido materno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('AP_materno_persona') is-invalid @enderror"
                        wire:model="AP_materno_persona" placeholder="">
                    @error('AP_materno_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Sexo
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('TI_sexo') is-invalid @enderror"
                        wire:model="TI_sexo">
                        <option selected>Seleccionar...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    @error('TI_sexo')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Número de DNI
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('NU_dni') is-invalid @enderror"
                        wire:model="NU_dni" placeholder="">
                    @error('NU_dni')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Número de celular
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('NU_celular') is-invalid @enderror"
                        wire:model="NU_celular" placeholder="">
                    @error('NU_celular')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Dirección
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('DI_persona') is-invalid @enderror"
                        wire:model="DI_persona" placeholder="">
                    @error('DI_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Imagen
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('IM_persona') is-invalid @enderror"
                        wire:model="IM_persona" placeholder="">
                    @error('IM_persona')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('personas.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="edit" type="button" wire:loading.attr="disabled"
                wire:target="update">
                Actualizar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>