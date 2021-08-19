@extends('adminlte::page')

@section('title', 'Contratos | Sistema de Gestión')

@section('content_header')
    <h1>Contratos</h1>
@stop

@section('content')
    @livewire('contracts.contracts-component')
@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script type="text/javascript">
        window.livewire.on('clientStore', () => {
            $('#addClientModal').modal('hide');
            $('#updateClientModal').modal('hide');
        });
    </script>

    @method('js')
@stop