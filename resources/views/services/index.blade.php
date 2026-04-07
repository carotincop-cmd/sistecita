@extends('layouts.admin')

@section('title','Gestión de Servicios')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    @include('services.partials._header')

    @include('services.partials._filters', ['categories' => $categories])

    @include('services.partials._alerts')

    @include('services.partials._table', ['services' => $services])

    @include('services.partials._pagination', ['services' => $services])

</div>

@endsection