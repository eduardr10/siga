<div>
    @include('shipping.modals.create')
    @include('shipping.modals.update')

    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <div class="form-group col-sm-3 col-xs-12">
        <button type="button" class="btn btn-warning rounded-0" data-toggle="modal" data-target="#addClientModal">
            Añadir
        </button>
    </div>
    <hr>
    @if ($contracts->count())
        <table class="table table-striped table-hover table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Contrato</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Puerto</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = $shippings->firstItem();
                @endphp
                @foreach ($shippings as $shipping)
                <tr>
                    <th scope="row">{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</th>
                    <td>{{ $shipping->contract->client->identity->name }}</td>
                    <td>{{ $shipping->contract->id }}</td>
                    <td>{{ $shipping->quantity }} {{ $shipping->unit->unit }}({{ $shipping->quality->quality }})</td>
                    <td>{{ date('d-m-Y', strtotime($shipping->date)) }}</td>
                    <td>{{ $shipping->destination }}</td>
                    <td>
                        <a href="javascript:void(0);" wire:click="manageClient({{ $shipping->id }})" class="mr-3" data-toggle="tooltip" data-placement="bottom"" title="Gestionar Contrato"><i class="fas fa-cogs"></i></a>
                    </td>
                </tr>
                @php
                    $i++;
                @endphp
                @endforeach
            </tbody>
        </table>   
    @else
        <div class="alert alert-dark" role="alert">
            Aún no hay contratos registrados
        </div>
    @endif
    @if ($contracts->hasPages())
    {{ $contracts->links() }}
    @endif
</div>
