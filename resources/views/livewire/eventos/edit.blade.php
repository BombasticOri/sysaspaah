<div class="container">
    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Editar Evento</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Nombre evento
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('NO_eventos') is-invalid @enderror"
                        wire:model="NO_eventos" placeholder="">
                    @error('NO_eventos')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Lugar evento
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('NO_lugar') is-invalid @enderror"
                        wire:model="NO_lugar" placeholder="">
                    @error('NO_lugar')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Fecha inicio
                        <code>*</code></label>
                    <input type="date"
                        class="form-control form-control-border border-width-2 @error('FE_inicio') is-invalid @enderror"
                        wire:model="FE_inicio" placeholder="">
                    @error('FE_inicio')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Fecha fin
                        <code>*</code></label>
                    <input type="date"
                        class="form-control form-control-border border-width-2 @error('FE_fin') is-invalid @enderror"
                        wire:model="FE_fin" placeholder="">
                    @error('FE_fin')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div>   
                <div class="form-group col">
                    <label>Descripción eventos
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('DE_eventos') is-invalid @enderror"
                        wire:model="DE_eventos" placeholder="">
                    @error('DE_eventos')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-danger btn-block" href="{{route('eventos.index')}}">
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
