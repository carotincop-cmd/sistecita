@extends('admin.layouts.admin')

@section('title','Gestión de Clientes')

@section('content')

<div x-data="clientModal()">

    @include('admin.clients.partials._header')
    @include('admin.clients.partials._filters')
    @include('admin.clients.partials._alerts')
    @include('admin.clients.partials._table', ['clients' => $clients])
    @include('admin.clients.partials._pagination', ['clients' => $clients])

        <template x-teleport="body">
        @include('admin.clients.partials._modal')
    </template>
</div>

@endsection