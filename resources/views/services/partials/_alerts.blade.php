@if(session('success'))
    <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
        {{ session('success') }}
    </div>
@endif