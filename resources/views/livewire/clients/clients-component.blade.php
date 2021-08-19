<div>
    @include('clients.modals.create')
    @include('clients.modals.update')

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
    <table class="table table-striped table-hover table-sm">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Código</th>
                <th scope="col">Contratos</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = $clients->firstItem();
            @endphp
            @foreach ($clients as $client)
            <tr>
                <th scope="row">{{ str_pad($i, 2, "0", STR_PAD_LEFT) }}</th>
                <td>{{ $client->identity->name }}</td>
                <td>{{ $client->identity->identity_number }}</td>
                <td>{{ $client->contracts ?? "" }}</td>
                <td>
                    <a href="javascript:void(0);" wire:click="manageClient({{ $client->id }})" class="mr-3" data-toggle="tooltip" data-placement="bottom"" title="Gestionar Cliente"><i class="fas fa-cogs"></i></a>
                    <a href="javascript:void(0);" wire:click="manageClient({{ $client->id }})" data-toggle="tooltip" data-placement="bottom" title="Añadir Contrato"><i class="far fa-plus-square"></i></a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
    </table>   
    @if ($clients->hasPages())
    {{ $clients->links() }}
    @endif
</div>
