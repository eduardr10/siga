<div>
    @include('contracts.modals.create')
    @include('contracts.modals.update')

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
                    <th scope="col">Cacao</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = $contracts->firstItem();
                @endphp
                @foreach ($contracts as $contract)
                <tr>
                    <th scope="row">{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</th>
                    <td>{{ $contract->client->identity->name }}</td>
                    <td>{{ $contract->orders->first()->cocoa->name }}</td>
                    <td>{{ $contract->orders->first()->quantity }} {{ $contract->orders->first()->unit->unit }}({{ $contract->orders->first()->quality->quality }})</td>
                    <td>{{ date('d-m-Y', strtotime($contract->date)) }}</td>
                    <td>{{ $contract->destination }}</td>
                    <td>
                        <a href="javascript:void(0);" wire:click="manageClient({{ $contract->id }})" class="mr-3" data-toggle="tooltip" data-placement="bottom"" title="Gestionar Contrato"><i class="fas fa-cogs"></i></a>
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
