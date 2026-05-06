@extends('admin.layouts.admin')

@section('title','Gestión de slides')

@section('content')

<div x-data="carouselModal()">

    @include('admin.carousel.partials._header')
    @include('admin.carousel.partials._alerts')
    @include('admin.carousel.partials._table', ['slides' => $slides])

    <template x-teleport="body">
        @include('admin.carousel.partials._modal')
    </template>
</div>

@endsection