@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $page_title ?? "" }}</h1>
@stop

@section('content')
    @livewire('clients.create-livewire-component')
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
@stop