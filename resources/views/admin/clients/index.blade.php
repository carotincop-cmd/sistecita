@extends('admin.layouts.admin')

@section('title','Gestión de Clientes')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    @include('admin.clients.partials._header')
    @include('admin.clients.partials._filters')
    @include('admin.clients.partials._table', ['clients' => $clients])
    @include('admin.clients.partials._pagination', ['clients' => $clients])

</div>

@endsection