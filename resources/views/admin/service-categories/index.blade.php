@extends('admin.layouts.admin')

@section('title','Gestión de Categorías de Servicios')

@section('content')

<div x-data="categoryModal()">
    @include('admin.service-categories.partials._header')
    @include('admin.service-categories.partials._filters')
    @include('admin.service-categories.partials._alerts')
    @include('admin.service-categories.partials._table', ['categories' => $categories])
    @include('admin.service-categories.partials._pagination', ['categories' => $categories])

    <template x-teleport="body">
        @include('admin.service-categories.partials._modal')
    </template>
</div>

@endsection