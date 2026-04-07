@extends('layouts.admin')

@section('title','Gestión de Categorías de Servicios')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    @include('service-categories.partials._header')

    @include('service-categories.partials._filters')

    @include('service-categories.partials._alerts')

    @include('service-categories.partials._table', ['categories' => $categories])

    @include('service-categories.partials._pagination', ['categories' => $categories])

</div>

@endsection