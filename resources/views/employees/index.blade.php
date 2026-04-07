@extends('layouts.admin')

@section('title','Gestión de Empleados')

@section('content')

<div x-data="employeeModal()" x-cloak>

    @include('employees.partials._header')
    @include('employees.partials._filters')
    @include('employees.partials._alerts')
    @include('employees.partials._table', ['employees' => $employees])
    @include('employees.partials._pagination', ['employees' => $employees])
    @include('employees.partials._modal')

</div>

@endsection