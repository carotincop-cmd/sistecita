<template>
  <footer id="contacto" class="relative overflow-hidden bg-[#0b0b0f] text-white">

    <!-- Glow decorativos -->
    <div class="absolute top-0 left-0 w-80 h-80 bg-pink-500/10 blur-3xl rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-500/10 blur-3xl rounded-full"></div>

    <div class="relative mx-auto max-w-7xl px-6 lg:px-8 pt-20 pb-10">

      <!-- TOP CARDS -->
      <div class="grid gap-6 lg:grid-cols-3">

        <!-- DIRECCIÓN -->
        <div class="group rounded-[28px] border border-yellow-500/40 bg-white/[0.03] p-7 backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:border-yellow-400 hover:bg-white/[0.05]">

          <div class="flex items-start gap-4">

            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-yellow-500 text-black shadow-xl">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1 1 12 6a2.5 2.5 0 0 1 0 5.5z"/>
              </svg>
            </div>

            <div>
              <h3 class="text-2xl font-bold text-yellow-400">
                Dirección
              </h3>

              <p class="mt-4 leading-8 text-gray-300">
                {{ setting?.address || 'Dirección no disponible' }}
              </p>
            </div>

          </div>

        </div>

        <!-- HORARIO -->
        <div class="group rounded-[28px] border border-yellow-500/40 bg-white/[0.03] p-7 backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:border-yellow-400 hover:bg-white/[0.05]">

          <div class="flex items-start gap-4">

            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-yellow-500 text-black shadow-xl">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 1a11 11 0 1 0 11 11A11 11 0 0 0 12 1zm1 11.59 3.3 3.29-1.42 1.42L11 13V6h2z"/>
              </svg>
            </div>

            <div>
              <h3 class="text-2xl font-bold text-yellow-400">
                Horarios
              </h3>
              De lunes a sábado, <br>
              {{ setting?.opening_hours || 'Horario no disponible' }}

            </div>

          </div>

        </div>

        <!-- CONTACTO -->
        <div class="group rounded-[28px] border border-yellow-500/40 bg-white/[0.03] p-7 backdrop-blur-xl transition-all duration-500 hover:-translate-y-1 hover:border-yellow-400 hover:bg-white/[0.05]">

          <div class="flex items-start gap-4">

            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-yellow-500 text-black shadow-xl">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1-.24 11.36 11.36 0 0 0 3.58.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.49a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.58 1 1 0 0 1-.25 1z"/>
              </svg>
            </div>

            <div>
              <h3 class="text-2xl font-bold text-yellow-400">
                Contacto
              </h3>

              <div class="mt-4 space-y-3 text-gray-300">

                <p>
                  📞 {{ setting?.phone || 'No disponible' }}
                </p>
                <p>
                  ✉️ {{ setting?.email || 'correo@ejemplo.com' }}
                </p>

              </div>
            </div>

          </div>

        </div>

      </div>

      <!-- BOTÓN -->
      <div class="mt-12 flex justify-center">

        <a
          href="#Servicios"
          class="group inline-flex items-center gap-3 rounded-2xl bg-yellow-500 px-8 py-5 text-lg font-bold text-black shadow-[0_20px_50px_rgba(234,179,8,0.25)] transition-all duration-300 hover:scale-105 hover:bg-yellow-400"
        >
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 transition-transform duration-300 group-hover:rotate-12" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7 2v2H5a2 2 0 0 0-2 2v13a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V6a2 2 0 0 0-2-2h-2V2h-2v2H9V2zm12 17a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V10h14z"/>
          </svg>

          Reserva ahora
        </a>

      </div>

      <!-- DIVIDER -->
      <div class="my-16 h-px w-full bg-gradient-to-r from-transparent via-yellow-500/40 to-transparent"></div>

      <!-- FOOTER GRID -->
      <div class="grid gap-14 lg:grid-cols-4">

        <!-- BRAND -->
        <div>

          <h2 class="text-4xl font-black tracking-tight text-yellow-400">
            {{ setting?.business_name || 'Mi Negocio' }}
          </h2>

          <p class="mt-6 leading-8 text-gray-400">
            Especialistas en manicure, pedicure y tratamientos profesionales
            para realzar tu estilo con acabados elegantes y duraderos.
          </p>

          <!-- REDES -->
          <div class="mt-8 flex gap-4">

            <!-- FACEBOOK -->
            <a
              v-if="setting?.facebook"
              :href="setting.facebook"
              target="_blank"
              class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/5 border border-white/10 text-yellow-400 transition-all duration-300 hover:-translate-y-1 hover:border-yellow-400 hover:bg-yellow-500 hover:text-black"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.5-3.89 3.77-3.89 1.09 0 2.22.19 2.22.19v2.44h-1.25c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99A10 10 0 0 0 22 12"/>
              </svg>
            </a>

            <!-- INSTAGRAM -->
            <a
              v-if="setting?.instagram"
              :href="setting.instagram"
              target="_blank"
              class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/5 border border-white/10 text-yellow-400 transition-all duration-300 hover:-translate-y-1 hover:border-yellow-400 hover:bg-yellow-500 hover:text-black"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7.75 2C4.57 2 2 4.57 2 7.75v8.5C2 19.43 4.57 22 7.75 22h8.5C19.43 22 22 19.43 22 16.25v-8.5C22 4.57 19.43 2 16.25 2zm0 2h8.5A3.75 3.75 0 0 1 20 7.75v8.5A3.75 3.75 0 0 1 16.25 20h-8.5A3.75 3.75 0 0 1 4 16.25v-8.5A3.75 3.75 0 0 1 7.75 4m8.75 1a1.25 1.25 0 1 0 1.25 1.25A1.25 1.25 0 0 0 16.5 5M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5m0 2a3 3 0 1 1-3 3 3 3 0 0 1 3-3"/>
              </svg>
            </a>

          </div>

        </div>

        <!-- LINKS -->
        <div>

          <h3 class="text-2xl font-bold text-yellow-400">
            Enlaces rápidos
          </h3>

          <ul class="mt-6 space-y-4 text-gray-400">

            <li>
              <a href="#inicio" class="transition hover:text-yellow-400">
                Inicio
              </a>
            </li>

            <li>
              <a href="#como-reservar" class="transition hover:text-yellow-400">
                ¿Como reservar?
              </a>
            </li>

            <li>
              <a href="#Servicios" class="transition hover:text-yellow-400">
                Servicios
              </a>
            </li>

            <li>
              <a href="#contacto" class="transition hover:text-yellow-400">
                Contacto
              </a>
            </li>

          </ul>

        </div>

        <!-- SERVICIOS -->
        <div>

          <h3 class="text-2xl font-bold text-yellow-400">
            Nuestros servicios
          </h3>

          <ul class="mt-6 space-y-4 text-gray-400">

            <li>✓ Tratamientos</li>
            <li>✓ Retiro de Uñas</li>
            <li>✓ Manicure</li>
            <li>✓ Pedicure</li>
            <li>✓ Nail art</li>

          </ul>

        </div>

        <!-- CONTACTO -->
        <div>

          <h3 class="text-2xl font-bold text-yellow-400">
            Información
          </h3>

          <div class="mt-6 space-y-5 text-gray-400">

            <p>
              📍 {{ setting?.address }}
            </p>

            <p>
              📞 {{ setting?.phone }}
            </p>

            <p>
              💬 {{ setting?.whatsapp }}
            </p>

          </div>

        </div>

      </div>

      <!-- BOTTOM -->
      <div class="mt-16 flex flex-col gap-5 border-t border-white/10 pt-8 text-sm text-gray-500 lg:flex-row lg:items-center lg:justify-between">

        <p>
          © {{ new Date().getFullYear() }}
          {{ setting?.business_name }}.
          Todos los derechos reservados.
        </p>

        <div class="flex flex-wrap gap-6">

          <a href="#" class="transition hover:text-yellow-400">
            Política de privacidad
          </a>

          <a href="#" class="transition hover:text-yellow-400">
            Términos y condiciones
          </a>

          <a href="#" class="transition hover:text-yellow-400">
            Política de cancelación
          </a>

        </div>

      </div>

    </div>

  </footer>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const setting = ref(null)

const fetchSetting = async () => {
  try {
    const res = await axios.get('/api/business-setting')
    setting.value = res.data.data
  } catch (error) {
    console.log('Error:', error)
  }
}

onMounted(() => {
  fetchSetting()
})
</script>