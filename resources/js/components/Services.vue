<template>
<section class="py-24 bg-[#f6f6f6]">

  <div class="mx-auto max-w-6xl px-6 lg:px-8 text-center">

    <!-- HEADER -->
    <h2 class="text-4xl font-bold text-gray-900">
      Cómo funciona
    </h2>

    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
      Reservar tu cita es fácil y rápido. Sigue estos tres sencillos pasos para disfrutar de nuestros servicios premium.
    </p>

    <!-- STEPS -->
    <div class="relative mt-16 grid md:grid-cols-3 gap-10 items-center">

      <!-- línea -->
      <div class="hidden md:block absolute top-12 left-0 right-0 h-[2px] bg-yellow-400/40"></div>

      <!-- STEP 1 -->
      <div class="relative flex flex-col items-center text-center">

        <div class="relative">
          <div class="w-24 h-24 flex items-center justify-center rounded-full bg-yellow-500 text-white text-3xl shadow-lg">
            📅
          </div>

          <span class="absolute -top-2 -right-2 bg-white border text-yellow-600 text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full shadow">
            1
          </span>
        </div>

        <h3 class="mt-6 text-lg font-semibold">
          Elige tu servicio
        </h3>

        <p class="mt-2 text-sm text-gray-500">
          Explora nuestra gama de servicios: manicure, pedicure, peluquería o depilación.
        </p>

      </div>

      <!-- STEP 2 -->
      <div class="relative flex flex-col items-center text-center">

        <div class="relative">
          <div class="w-24 h-24 flex items-center justify-center rounded-full bg-yellow-400 text-white text-3xl shadow-lg">
            ⏰
          </div>

          <span class="absolute -top-2 -right-2 bg-white border text-yellow-600 text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full shadow">
            2
          </span>
        </div>

        <h3 class="mt-6 text-lg font-semibold">
          Selecciona fecha y hora
        </h3>

        <p class="mt-2 text-sm text-gray-500">
          Elige el horario que mejor se adapte a tu agenda con disponibilidad en tiempo real.
        </p>

      </div>

      <!-- STEP 3 -->
      <div class="relative flex flex-col items-center text-center">

        <div class="relative">
          <div class="w-24 h-24 flex items-center justify-center rounded-full bg-yellow-300 text-white text-3xl shadow-lg">
            ✔️
          </div>

          <span class="absolute -top-2 -right-2 bg-white border text-yellow-600 text-sm font-bold w-8 h-8 flex items-center justify-center rounded-full shadow">
            3
          </span>
        </div>

        <h3 class="mt-6 text-lg font-semibold">
          Confirma tu reserva
        </h3>

        <p class="mt-2 text-sm text-gray-500">
          Recibe confirmación inmediata por correo o SMS con todos los detalles.
        </p>

      </div>

    </div>

    <!-- CTA BOX -->
    <div class="mt-20 bg-[#efe6d4] rounded-3xl p-10 shadow-md">

      <h3 class="text-2xl font-bold text-gray-900">
        ¿Lista para transformar tus uñas?
      </h3>

      <p class="mt-3 text-gray-600">
        Reserva tu cita ahora y disfruta de servicios profesionales.
      </p>

      <a
        href="#reservar"
        class="mt-6 inline-flex items-center gap-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-3 rounded-xl shadow transition"
      >
        📅 Reserva ahora
      </a>

      <p class="mt-4 text-xs text-gray-500">
        ✔ Sin cargos ocultos • Cancelación flexible
      </p>

    </div>

  </div>

</section>
</template>
