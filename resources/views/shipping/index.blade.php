@extends('adminlte::page')

@section('title', 'Despachos | Sistema de Gestión')

@section('content_header')
    <h1>Despachos</h1>
@stop

@section('content')
    @livewire('shipping.shipping-component')
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
    @method('js')
@stop