<!-- Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Añadir Contrato</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
                <form>
                    <div class="form-group col-xs-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <label class="input-group-text rounded-0" for="client">Cliente</label>
                            </div>
                            <select class="custom-select rounded-0" id="client" wire:model.defer="client_id">
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->identity->name }}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-4" wire:ignore>
                            <input type="date" class="form-control rounded-0" id="date" wire:model.defer="date" value="{{ $date }}">
                            @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group col-8">
                            <input type="text" class="form-control rounded-0" id="destination" placeholder="Destino del producto" wire:model.defer="destination">
                            @error('destination') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-group col-xs-12" wire:ignore>
                        <textarea class="form-control rounded-0" id="description" rows="6" wire:model.defer="description" placeholder="Descripción"></textarea>
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    @foreach ($orders as $index => $order)
                        <div class="form-row">
                            <div class="form-group col-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text rounded-0" for="cocoa">Cacao</label>
                                    </div>
                                    <select class="custom-select rounded-0" id="cocoa" 
                                        name="orders[{{$index}}][cocoa_id]" 
                                        wire:model.defer="orders.{{$index}}.cocoa_id"
                                        wire:ignore.self
                                        >
                                        @foreach ($cocoas as $cocoa)
                                            <option wire:ignore value="{{ $cocoa->id}}">{{ $cocoa->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <div class="input-group">
                                    <input type="text"
                                        name="orders[{{$index}}][quantity]"
                                        class="form-control rounded-0"
                                        placeholder="Cantidad"
                                        wire:model.defer="orders.{{$index}}.quantity" 
                                        wire:ignore
                                        />
                                    <div class="input-group-append">
                                        <select class="custom-select rounded-0" id="unit" 
                                            name="orders[{{$index}}][unit_id]" 
                                            wire:model.defer="orders.{{$index}}.unit_id"
                                            wire:ignore
                                            >
                                            @foreach ($units as $unit)
                                                <option wire:ignore class="dropdown-item" value="{{ $unit->id }}">{{ $unit->unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text rounded-0" for="quality">Calidad</label>
                                    </div>
                                    <select class="custom-select rounded-0" id="quality" 
                                        name="orders[{{$index}}][quality_id]" 
                                        wire:model.defer="orders.{{$index}}.quality_id"
                                        wire:ignore
                                        >
                                        @foreach ($qualities as $quality)
                                            <option wire:ignore value="{{ $quality->id }}">{{ $quality->quality }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col">
                                <div class="input-group align-middle pt-1">
                                    <a href="#" class="rounded-circle " wire:click.prevent="removeOrder({{$index}})" title="Eliminar Pedido">
                                        <span class="align-middle">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-success btn-sm rounded-0" wire:click.prevent="addOrder()">Añadir Pedido</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary rounded-0" wire:click.prevent="store">Guardar</button>
                <button type="button" class="btn btn-secondary close-btn rounded-0" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

@push('js')
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script> --}}
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then(function(description){
                description.model.document.on('change:data', () => {
                    @this.set('description', description.getData());
                });
            })
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush