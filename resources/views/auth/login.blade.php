<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Jennifer Nails</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#e5e5e5] flex items-center justify-center px-4">

    <div class="w-full max-w-5xl min-h-[680px] bg-white rounded-sm shadow-2xl overflow-hidden flex">
        
        {{-- Lado izquierdo --}}
        <div class="hidden md:block w-1/2 relative">
            <img
                src="{{ asset('img/img1.jpg') }}"
                alt="Jennifer Nails"
                class="absolute inset-0 w-full h-full object-cover"
            >

            <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-10">


                <h2 class="text-pink-600 text-6xl font-bold leading-none mb-5">
                    Jennifer Nails
                </h2>

                <div class="w-28 h-2 bg-pink-500 mb-8"></div>

                <p class="text-pink-500 text-[18px] leading-10 max-w-md font-medium">
                    No subestimes el poder de unas uñas bonitas,
                    las uñas son como el punto final de una frase.
                </p>
            </div>
        </div>

        {{-- Lado derecho --}}
        <div class="w-full md:w-1/2 bg-[#e3a1c4] flex items-center justify-center px-10 py-14">
            <div class="w-full max-w-md text-center">
                <h1 class="text-[64px] font-bold text-pink-600 leading-none mb-4">
                    LOGIN
                </h1>

                <p class="text-pink-600 text-[18px] mb-8">
                    No subestimes el poder de unas uñas bonitas
                </p>

                @if ($errors->any())
                    <div class="mb-5 rounded bg-white/90 border border-red-300 px-4 py-3 text-left text-red-600 shadow">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Ingrese correo"
                        class="w-full h-14 bg-white px-6 text-[16px] text-gray-600 border-l-[6px] border-pink-500 shadow-md outline-none focus:ring-2 focus:ring-pink-400"
                        required
                    >

                    <input
                        type="password"
                        name="password"
                        placeholder="Ingrese contraseña"
                        class="w-full h-14 bg-white px-6 text-[16px] text-gray-600 border-l-[6px] border-pink-500 shadow-md outline-none focus:ring-2 focus:ring-pink-400"
                        required
                    >


                    <button
                        type="submit"
                        class="w-full h-14 rounded-full bg-pink-600 text-white text-[20px] font-bold shadow-lg hover:bg-pink-700 transition"
                    >
                        INGRESAR
                    </button>

                </form>
            </div>
        </div>

    </div>

</body>
</html>