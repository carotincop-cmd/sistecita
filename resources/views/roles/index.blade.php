@extends('layouts.admin')

@section('title','Gestión de Roles')

@section('content')

<div x-data="roleModal()" x-cloak>

    @include('roles.partials._header')
    @include('roles.partials._filters')
    @include('roles.partials._alerts')
    @include('roles.partials._table', ['roles' => $roles])
    @include('roles.partials._pagination', ['roles' => $roles])

    @include('roles.partials._modal')
</div>

@endsection