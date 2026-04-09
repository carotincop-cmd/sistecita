@extends('admin.layouts.admin')

@section('title','Gestión de Empleados')

@section('content')

<div x-data="employeeModal()" x-cloak>

    @include('admin.employees.partials._header')
    @include('admin.employees.partials._filters')
    @include('admin.employees.partials._alerts')
    @include('admin.employees.partials._table', ['employees' => $employees])
    @include('admin.employees.partials._pagination', ['employees' => $employees])
    @include('admin.employees.partials._modal')

</div>

@endsection