@extends('admin.layouts.admin')

@section('title','Gestión de Servicios')

@section('content')

<div x-data="serviceModal()" x-cloak>

    @include('admin.services.partials._header')
    @include('admin.services.partials._filters', ['categories' => $categories])
    @include('admin.services.partials._alerts')
    @include('admin.services.partials._table', ['services' => $services])
    @include('admin.services.partials._pagination', ['services' => $services])
    @include('admin.services.partials._modal')
</div>

@endsection