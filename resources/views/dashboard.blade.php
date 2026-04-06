@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-6 text-pink-600">
    Panel de control
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- Citas hoy -->
    <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-lg transition duration-300">
        <h3 class="text-pink-600 text-sm font-medium">Citas hoy</h3>
        <p class="text-3xl font-bold text-pink-700 mt-2">12</p>
    </div>

    <!-- Clientes -->
    <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-lg transition duration-300">
        <h3 class="text-pink-600 text-sm font-medium">Clientes</h3>
        <p class="text-3xl font-bold text-pink-700 mt-2">85</p>
    </div>

    <!-- Servicios -->
    <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-lg transition duration-300">
        <h3 class="text-pink-600 text-sm font-medium">Servicios</h3>
        <p class="text-3xl font-bold text-pink-700 mt-2">15</p>
    </div>

</div>

@endsection