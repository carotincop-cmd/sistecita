<template>
  <footer class="py-20 bg-gray-50">

    <div class="mx-auto max-w-7xl px-6 lg:px-8">

      <!-- TÍTULO -->
      <div class="mx-auto max-w-2xl text-center">
        <span class="inline-block rounded-full bg-pink-100 px-4 py-2 text-sm font-semibold text-pink-600">
          📍 Contacto
        </span>

        <h2 class="mt-4 text-4xl font-bold text-gray-900">
          {{ setting?.business_name || 'Mi Negocio' }}
        </h2>

        <p class="mt-4 text-gray-600">
          Estamos listos para atenderte en cualquier momento
        </p>
      </div>

      <!-- CARDS INFO -->
      <div class="mt-14 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">

        <!-- DIRECCIÓN -->
        <div class="rounded-3xl bg-white shadow-lg p-6 text-center">
          📍
          <h3 class="mt-2 font-bold text-gray-900">Dirección</h3>
          <p class="text-gray-500 mt-2 text-sm">
            {{ setting?.address }}
          </p>
        </div>

        <!-- TELÉFONO -->
        <div class="rounded-3xl bg-white shadow-lg p-6 text-center">
          📞
          <h3 class="mt-2 font-bold text-gray-900">Teléfono</h3>
          <p class="text-gray-500 mt-2 text-sm">
            {{ setting?.phone }}
          </p>

          <p class="text-pink-600 font-semibold mt-2 text-sm">
            WhatsApp: {{ setting?.whatsapp }}
          </p>
        </div>

        <!-- HORARIO -->
        <div class="rounded-3xl bg-white shadow-lg p-6 text-center">
          🕒
          <h3 class="mt-2 font-bold text-gray-900">Horario</h3>
          <p class="text-gray-500 mt-2 text-sm">
            {{ setting?.opening_hours }}
          </p>
        </div>

      </div>

      <!-- REDES -->
      <div class="mt-14 text-center">

        <h3 class="text-xl font-bold text-gray-900 mb-4">
          Síguenos
        </h3>

        <div class="flex justify-center gap-6 text-pink-600 font-semibold">

          <a v-if="setting?.facebook" :href="setting.facebook" target="_blank">
            Facebook
          </a>

          <a v-if="setting?.instagram" :href="setting.instagram" target="_blank">
            Instagram
          </a>

          <a v-if="setting?.tiktok" :href="setting.tiktok" target="_blank">
            TikTok
          </a>

        </div>
      </div>

      <!-- COPYRIGHT -->
      <div class="mt-14 text-center text-sm text-gray-500">
        © {{ new Date().getFullYear() }} {{ setting?.business_name }}. Todos los derechos reservados.
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

    // 🔥 IMPORTANTE: ahora viene dentro de "data"
    setting.value = res.data.data

  } catch (error) {
    console.log('Error:', error)
  }
}

onMounted(() => {
  fetchSetting()
})
</script>