<template>
  <section id="inicio" class="hero" role="main">

    <!-- Wave SVG background -->
    <svg class="wave-svg" viewBox="0 0 1440 900" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 300 Q200 100 400 300 T800 300 T1200 300 T1600 300 L1600 0 L0 0Z" fill="rgba(255,182,210,0.18)" />
      <path d="M0 500 Q300 300 600 500 T1200 500 T1800 500 L1800 900 L0 900Z" fill="rgba(255,200,220,0.15)" />
      <path d="M-50 420 Q400 200 700 420 T1200 350 T1600 400" stroke="rgba(201,152,74,0.35)" stroke-width="1.5" fill="none"/>
      <path d="M-50 460 Q350 260 650 460 T1150 380 T1550 440" stroke="rgba(232,212,139,0.25)" stroke-width="1" fill="none"/>
    </svg>

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="hero-inner">

      <!-- LEFT: TEXT -->
      <div class="hero-text">
<div class="mb-2">
  <a 
    href="https://www.google.com/maps/place/Urb.+Los+Angeles+-+Imperial+-+Ca%C3%B1ete/@-13.0582452,-76.3591231,17z/data=!3m1!4b1!4m6!3m5!1s0x910ffb9e4e146175:0xc5a7031a0f0ff27a!8m2!3d-13.0582452!4d-76.3565482!16s%2Fg%2F11hg4zwd51?entry=ttu&g_ep=EgoyMDI2MDQyMi4wIKXMDSoASAFQAw%3D%3D"
    target="_blank"
    rel="noopener noreferrer"
    title="Ver ubicación en Google Maps"
    class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white/80 border border-pink-200 text-xs text-pink-700 backdrop-blur hover:bg-white hover:shadow-md transition"
  >
    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#c06080" stroke-width="2.5">
      <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
      <circle cx="12" cy="10" r="3"/>
    </svg>

    <span>San Vicente, Cañete, Perú.</span>
  </a>
</div>

        <div class="badge">
          <span class="badge-dot"></span>
          Uñas & Estilo Profesional
        </div>

        <h1>
          Uñas perfectas<br>
          empiezan <span class="highlight">aquí</span>
        </h1>
        <div class="subtitle-gold">Diseñado para ti</div>

        <p class="desc">
          Manicure, pedicure y tratamientos de uñas con resultados duraderos.
          Más de <strong class="accent">5 años de experiencia</strong>, trabajando con productos de alta calidad para un acabado perfecto.
        </p>

        <div class="badges-row">
          <span class="tag">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#e91e8c" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
            +5 años de experiencia
          </span>
          <span class="tag">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#e91e8c" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Higiene profesional
          </span>
          <span class="tag">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#e91e8c" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            Productos Premium
          </span>
        </div>

        <div class="btn-group">
          <a href="#Servicios" class="btn-primary">Ver servicios →</a>
        </div>

        <p class="caption">✦ Confirmación instantánea</p>
      </div>

      <!-- RIGHT: PHOTO COLLAGE + CAROUSEL -->
      <div class="hero-right">

        <!-- Loading state -->
        <div v-if="loading" class="collage-loading">
          <span class="loading-text">Cargando...</span>
        </div>

        <!-- Collage with slides -->
        <div v-else-if="slides.length > 0" class="collage">

          <!-- Large card: current slide -->
          <div class="photo-card large">
            <transition name="fade">
              <img
                :key="currentSlide"
                :src="slides[currentSlide].image"
                :alt="slides[currentSlide].title"
                class="photo-img"
              />
            </transition>
            <div class="photo-overlay">
              <p v-if="slides[currentSlide].subtitle" class="slide-subtitle">{{ slides[currentSlide].subtitle }}</p>
              <h2 v-if="slides[currentSlide].title" class="slide-title">{{ slides[currentSlide].title }}</h2>
              <p v-if="slides[currentSlide].description" class="slide-desc">{{ slides[currentSlide].description }}</p>
              <a
                v-if="slides[currentSlide].button_text && slides[currentSlide].button_link"
                :href="slides[currentSlide].button_link"
                class="slide-btn"
              >
                {{ slides[currentSlide].button_text }}
              </a>
            </div>
            <span class="float-tag">✦ Manicure</span>
          </div>

          <!-- Small card 1: siguiente slide -->
          <div class="photo-card small" v-if="slides.length > 1">
            <img
              :src="slides[(currentSlide + 1) % slides.length].image"
              :alt="slides[(currentSlide + 1) % slides.length].title"
              class="photo-img"
            />
          </div>

          <!-- Small card 2: otro slide -->
          <div class="photo-card small" v-if="slides.length > 2">
            <img
              :src="slides[(currentSlide + 2) % slides.length].image"
              :alt="slides[(currentSlide + 2) % slides.length].title"
              class="photo-img"
            />
          </div>

          <div class="gold-line"></div>
        </div>

        <!-- Empty state -->
        <div v-else class="collage-loading">
          <span class="loading-text">No hay slides disponibles</span>
        </div>

        <!-- Dots -->
        <div v-if="slides.length > 1" class="dots">
          <button
            v-for="(slide, index) in slides"
            :key="slide.id"
            class="dot"
            :class="{ active: currentSlide === index }"
            @click="goToSlide(index)"
          ></button>
        </div>

      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'
import axios from 'axios'

const slides = ref([])
const currentSlide = ref(0)
const loading = ref(true)
let interval = null

const fetchSlides = async () => {
  try {
    const res = await axios.get('/api/carousel')
    slides.value = res.data
  } catch (error) {
    console.error('Error cargando carousel:', error)
  } finally {
    loading.value = false
  }
}

const nextSlide = () => {
  if (slides.value.length <= 1) return
  currentSlide.value = (currentSlide.value + 1) % slides.value.length
}

const goToSlide = (index) => {
  currentSlide.value = index
}

const startAuto = () => {
  interval = setInterval(nextSlide, 4000)
}

onMounted(async () => {
  await fetchSlides()
  startAuto()
})

onBeforeUnmount(() => {
  clearInterval(interval)
})
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400&family=Jost:wght@300;400;500&display=swap');

.hero {
  min-height: 92vh;
  background: linear-gradient(135deg, #fff0f5 0%, #fce4ec 30%, #ffd6e7 60%, #ffe0ec 100%);
  position: relative;
  overflow: hidden;
  display: flex;
  align-items: center;
  font-family: 'Jost', sans-serif;

  /* espacio para curva */
  padding-bottom: 120px;
}

/* curva inferior ovalada */
.hero::after {
  content: "";
  position: absolute;

  left: -5%;
  bottom: -140px;

  width: 110%;
  height: 260px;

  background: #fff;

  border-radius: 50%;

  z-index: 1;
}

.wave-svg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 0;
}

.hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 3rem 2rem;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 3rem;
  align-items: center;
}

/* ---- Orbs ---- */
.orb {
  position: absolute;
  border-radius: 50%;
  pointer-events: none;
  z-index: 0;
}

.orb-1 {
  width: 320px;
  height: 320px;
  background: radial-gradient(circle, rgba(233,30,140,0.12) 0%, transparent 70%);
  top: -80px;
  right: -60px;
}

.orb-2 {
  width: 260px;
  height: 260px;
  background: radial-gradient(circle, rgba(201,152,74,0.10) 0%, transparent 70%);
  bottom: 40px;
  left: -40px;
}

/* ---- Left text ---- */
.location {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 12px;
  color: #c06080;
  margin-bottom: 0.5rem;
  letter-spacing: 0.05em;
  font-weight: 400;
}

.badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: rgba(255,255,255,0.7);
  border: 1px solid #f8bbd9;
  border-radius: 999px;
  padding: 6px 16px;
  font-size: 12px;
  letter-spacing: 0.08em;
  color: #b5396a;
  font-weight: 500;
  margin-bottom: 1.5rem;
  backdrop-filter: blur(8px);
  text-transform: uppercase;
}

.badge-dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #e91e8c;
  box-shadow: 0 0 0 3px rgba(233,30,140,0.2);
  animation: pulse 2s infinite;
}

@keyframes pulse {
  0%, 100% {
    box-shadow: 0 0 0 3px rgba(233,30,140,0.2);
  }

  50% {
    box-shadow: 0 0 0 6px rgba(233,30,140,0.1);
  }
}

h1 {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(2.4rem, 4vw, 3.6rem);
  font-weight: 600;
  line-height: 1.1;
  color: #2d1a20;
  margin-bottom: 0.4rem;
}

.highlight {
  font-style: italic;
  background: linear-gradient(90deg, #e91e8c, #c2185b, #d4836e);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.subtitle-gold {
  font-family: 'Cormorant Garamond', serif;
  font-size: clamp(1.4rem, 2.5vw, 2.1rem);
  font-style: italic;
  color: #c9984a;
  margin-bottom: 1.2rem;
}

.desc {
  font-size: 0.92rem;
  line-height: 1.8;
  color: #6b3a4a;
  max-width: 420px;
  margin-bottom: 1.4rem;
  font-weight: 300;
}

.accent {
  color: #c2185b;
  font-weight: 500;
}

.badges-row {
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  margin-bottom: 1.8rem;
}

.tag {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-size: 11px;
  color: #8b3060;
  background: rgba(255,255,255,0.6);
  border: 1px solid #f4a8c8;
  border-radius: 999px;
  padding: 4px 12px;
  font-weight: 500;
  backdrop-filter: blur(4px);
}

.btn-group {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.btn-primary {
  background: linear-gradient(135deg, #e91e8c, #c2185b);
  color: #fff;
  border: none;
  border-radius: 50px;
  padding: 13px 28px;
  font-size: 13px;
  font-family: 'Jost', sans-serif;
  font-weight: 500;
  letter-spacing: 0.06em;
  cursor: pointer;
  box-shadow: 0 8px 24px rgba(233,30,140,0.3);
  transition: all 0.25s;
  text-decoration: none;
  display: inline-block;
}

.btn-primary:hover {
  transform: translateY(-2px);
  box-shadow: 0 12px 32px rgba(233,30,140,0.4);
}

.btn-outline {
  background: rgba(255,255,255,0.7);
  color: #2d1a20;
  border: 1px solid #f4a8c8;
  border-radius: 50px;
  padding: 13px 28px;
  font-size: 13px;
  font-family: 'Jost', sans-serif;
  font-weight: 400;
  letter-spacing: 0.06em;
  cursor: pointer;
  backdrop-filter: blur(8px);
  transition: all 0.25s;
  text-decoration: none;
  display: inline-block;
}

.btn-outline:hover {
  background: rgba(255,255,255,0.9);
}

.caption {
  margin-top: 1.2rem;
  font-size: 11px;
  color: #b07090;
  letter-spacing: 0.03em;
}

/* ---- Right collage ---- */
.hero-right {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.collage {
  position: relative;
  display: grid;
  grid-template-columns: 1.3fr 1fr;
  grid-template-rows: auto auto;
  gap: 10px;
  width: 100%;
}

.photo-card {
  border-radius: 18px;
  overflow: hidden;
  position: relative;
  box-shadow: 0 10px 40px rgba(176,80,120,0.18);
  background: #fce4ec;
}

.photo-card.large {
  grid-row: span 2;
  height: 500px;
}

.photo-card.small {
  height: 240px;
}

.photo-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.photo-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.55) 0%, transparent 60%);
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  padding: 1.2rem;
  color: #fff;
}

.slide-subtitle {
  font-size: 11px;
  color: rgba(255,200,220,0.9);
  margin-bottom: 4px;
  letter-spacing: 0.05em;
}

.slide-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.3rem;
  font-weight: 600;
  line-height: 1.2;
  margin-bottom: 4px;
}

.slide-desc {
  font-size: 12px;
  color: rgba(255,255,255,0.85);
  margin-bottom: 8px;
  line-height: 1.5;
}

.slide-btn {
  display: inline-block;
  background: #e91e8c;
  color: #fff;
  font-size: 11px;
  font-family: 'Jost', sans-serif;
  padding: 5px 14px;
  border-radius: 999px;
  text-decoration: none;
  font-weight: 500;
  width: fit-content;
}

.float-tag {
  position: absolute;
  top: 12px;
  left: 12px;
  background: rgba(255,255,255,0.85);
  backdrop-filter: blur(6px);
  border-radius: 999px;
  padding: 4px 12px;
  font-size: 11px;
  color: #c2185b;
  font-weight: 500;
  z-index: 2;
  border: 1px solid rgba(244,168,200,0.6);
}

.gold-line {
  position: absolute;
  bottom: -10px;
  left: 0;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #c9984a, #e8d48b, #c9984a, transparent);
  opacity: 0.6;
}

/* Loading / empty */
.collage-loading {
  width: 100%;
  min-height: 340px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 18px;
  background: linear-gradient(145deg, #fce4ec, #ffd6e7);
}

.loading-text {
  font-family: 'Cormorant Garamond', serif;
  font-size: 1.2rem;
  color: #c2185b;
  font-style: italic;
}

/* Dots */
.dots {
  display: flex;
  gap: 6px;
  margin-top: 1rem;
  justify-content: center;
}

.dot {
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #f4a8c8;
  cursor: pointer;
  border: none;
  padding: 0;
  transition: all 0.3s;
}

.dot.active {
  width: 20px;
  border-radius: 4px;
  background: #e91e8c;
}

/* Fade transition */
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.6s ease;
  position: absolute;
  inset: 0;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

/* Responsive */
@media (max-width: 768px) {

  .hero-inner {
    grid-template-columns: 1fr;
  }

  .hero-right {
    display: none;
  }

  .hero {
    padding-bottom: 80px;
  }

  .hero::after {
    height: 160px;
    bottom: -90px;
  }
}
</style>