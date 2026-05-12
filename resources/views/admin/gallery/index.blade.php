@extends('admin.layouts.admin')

@section('title','Gestión de Galería')

@section('content')

<div x-data="galleryModal()">

    @include('admin.gallery.partials._header')

    @include('admin.gallery.partials._filters', [
        'services' => $services
    ])

    @include('admin.gallery.partials._alerts')

    @include('admin.gallery.partials._table', [
        'galleries' => $galleries
    ])

    @include('admin.gallery.partials._pagination', [
        'galleries' => $galleries
    ])

    <template x-teleport="body">
        @include('admin.gallery.partials._modal')
    </template>

</div>

@endsection