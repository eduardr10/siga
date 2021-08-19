<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control rounded-0" id="name" placeholder="Empresa" wire:model.defer="name">
                        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group col-xs-12">
                        <input type="text" class="form-control rounded-0" id="identity_number" placeholder="Código" wire:model.defer="identity_number">
                        @error('identity_number') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-0" wire:click.prevent="store">Guardar</button>
                <button type="button" class="btn btn-secondary close-btn rounded-0" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>