@extends('layouts.admin')

@section('title','Gestión de Usuarios')

@section('content')

<div x-data="userModal()" x-cloak>

    @include('users.partials._header')
    @include('users.partials._filters', ['roles' => $roles])
    @include('users.partials._alerts')
    @include('users.partials._table', ['users' => $users])
    @include('users.partials._pagination', ['users' => $users])
    @include('users.partials._modal')

</div>

@endsection