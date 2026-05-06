@extends('admin.layouts.admin')

@section('title','Gestión de Roles')

@section('content')

<div x-data="roleModal()">

    @include('admin.roles.partials._header')
    @include('admin.roles.partials._filters')
    @include('admin.roles.partials._alerts')
    @include('admin.roles.partials._table', ['roles' => $roles])
    @include('admin.roles.partials._pagination', ['roles' => $roles])

    <template x-teleport="body">
        @include('admin.roles.partials._modal')
    </template>
</div>

@endsection