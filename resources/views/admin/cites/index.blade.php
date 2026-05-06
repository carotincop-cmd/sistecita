@extends('admin.layouts.admin')

@section('title','Gestión de Citas')

@section('content')

<div x-data="citeModal()">

    @include('admin.cites.partials._header')
    @include('admin.cites.partials._filters')
    @include('admin.cites.partials._alerts')
    @include('admin.cites.partials._table', ['cites' => $cites])
    @include('admin.cites.partials._pagination', ['cites' => $cites])

    <template x-teleport="body">
        @include('admin.cites.partials._modal')
    </template>

</div>

@endsection