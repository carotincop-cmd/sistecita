@extends('admin.layouts.admin')

@section('title','Gestión de direcciones')

@section('content')

<div x-data>

    @include('admin.direccion.partials._header')
    @include('admin.direccion.partials._alerts')
    @include('admin.direccion.partials._table', ['setting' => $setting])

    <template x-teleport="body">
        @include('admin.direccion.partials._modal')
    </template>

</div>

@endsection