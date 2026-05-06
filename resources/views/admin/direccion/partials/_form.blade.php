{{-- Negocio + WhatsApp + Teléfono --}}
<div class="grid grid-cols-4 gap-3">
    <div class="col-span-2">
        <label class="text-sm text-pink-700">Nombre Negocio</label>
        <input type="text" name="business_name" x-model="$store.bsModal.form.business_name"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">WhatsApp</label>
        <input type="text" name="whatsapp" x-model="$store.bsModal.form.whatsapp"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Teléfono</label>
        <input type="text" name="phone" x-model="$store.bsModal.form.phone"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
</div>

{{-- Dirección + Distrito + Ciudad --}}
<div class="grid grid-cols-4 gap-3">
    <div class="col-span-2">
        <label class="text-sm text-pink-700">Dirección</label>
        <input type="text" name="address" x-model="$store.bsModal.form.address"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Distrito</label>
        <input type="text" name="district" x-model="$store.bsModal.form.district"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Ciudad</label>
        <input type="text" name="city" x-model="$store.bsModal.form.city"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
</div>

{{-- Referencia + Correo + Latitud + Longitud --}}
<div class="grid grid-cols-4 gap-3">
    <div>
        <label class="text-sm text-pink-700">Referencia</label>
        <input type="text" name="reference" x-model="$store.bsModal.form.reference"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Correo</label>
        <input type="email" name="email" x-model="$store.bsModal.form.email"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Latitud</label>
        <input type="text" name="latitude" x-model="$store.bsModal.form.latitude"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Longitud</label>
        <input type="text" name="longitude" x-model="$store.bsModal.form.longitude"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
</div>

{{-- Logo + Google Maps + Horario --}}
<div class="grid grid-cols-3 gap-3">
    <div>
        <label class="text-sm text-pink-700">Logo (URL)</label>
        <input type="text" name="logo" x-model="$store.bsModal.form.logo"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500"
               placeholder="URL o nombre de archivo">
    </div>
    <div>
        <label class="text-sm text-pink-700">Google Maps URL</label>
        <input type="text" name="google_maps_url" x-model="$store.bsModal.form.google_maps_url"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
    <div>
        <label class="text-sm text-pink-700">Horario</label>
        <input type="text" name="opening_hours" x-model="$store.bsModal.form.opening_hours"
               class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
    </div>
</div>

{{-- Redes + Descripción --}}
<div class="grid grid-cols-2 gap-3">
    <div class="grid grid-cols-3 gap-3">
        <div>
            <label class="text-sm text-pink-700">Facebook</label>
            <input type="text" name="facebook" x-model="$store.bsModal.form.facebook"
                   class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
        </div>
        <div>
            <label class="text-sm text-pink-700">Instagram</label>
            <input type="text" name="instagram" x-model="$store.bsModal.form.instagram"
                   class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
        </div>
        <div>
            <label class="text-sm text-pink-700">TikTok</label>
            <input type="text" name="tiktok" x-model="$store.bsModal.form.tiktok"
                   class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500">
        </div>
    </div>
    <div>
        <label class="text-sm text-pink-700">Descripción</label>
        <textarea name="about_text" rows="2" x-model="$store.bsModal.form.about_text"
                  class="w-full border border-pink-200 rounded-xl px-3 py-2 bg-pink-50/40 text-pink-700 focus:ring-2 focus:ring-pink-500"></textarea>
    </div>
</div>