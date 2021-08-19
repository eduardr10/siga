@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')
    @livewire('clients.clients-component')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @livewireStyles
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
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
@stop