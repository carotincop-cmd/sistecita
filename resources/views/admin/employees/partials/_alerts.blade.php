@if(session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-50 border border-red-200 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif