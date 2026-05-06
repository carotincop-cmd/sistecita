@extends('admin.layouts.admin')

@section('title','Gestión de Usuarios')

@section('content')

<div x-data="userModal()">

    @include('admin.users.partials._header')
    @include('admin.users.partials._filters', ['roles' => $roles])
    @include('admin.users.partials._alerts')
    @include('admin.users.partials._table', ['users' => $users])
    @include('admin.users.partials._pagination', ['users' => $users])

    <template x-teleport="body">
        @include('admin.users.partials._modal')
    </template>
</div>

@endsection