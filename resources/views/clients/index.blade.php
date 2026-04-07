@extends('layouts.admin')

@section('title','Gestión de Clientes')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    @include('clients.partials._header')
    @include('clients.partials._filters')
    @include('clients.partials._table', ['clients' => $clients])
    @include('clients.partials._pagination', ['clients' => $clients])

</div>

@endsection