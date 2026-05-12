{{-- 🌙 Theme toggle --}}
<script>
    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');

    function updateThemeIcon() {
        if (!themeIcon) return;
        themeIcon.textContent = document.documentElement.classList.contains('dark') ? '☀️' : '🌙';
    }

    updateThemeIcon();

    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
            updateThemeIcon();
        });
    }
</script>

{{-- 🚀 Alpine components --}}
<script>
document.addEventListener('alpine:init', () => {

    // 🔥 ROLES MODAL
    Alpine.data('roleModal', () => ({
        open: false,
        isEdit: false,
        formAction: '',
        form: {
            id: null,
            name: '',
            description: '',
            status: '1',
            modules: []
        },

        openCreate() {
            this.open = true;
            this.isEdit = false;
            this.formAction = "{{ route('roles.store') }}";
            this.resetForm();
        },

        openEdit(role) {
            this.open = true;
            this.isEdit = true;
            this.formAction = "{{ url('roles') }}/" + role.id;
            
            this.form = {
                id: role.id,
                name: role.name,
                description: role.description ?? '',
                status: role.status ? '1' : '0',
                modules: role.modules.map(m => m.id)
            };
        },

        close() {
            this.open = false;
        },

        resetForm() {
            this.form = {
                id: null,
                name: '',
                description: '',
                status: '1',
                modules: []
            };
        }
    }));


    // 🔥 USERS MODAL
    Alpine.data('userModal', () => ({
        open: false,
        isEdit: false,
        formAction: '',

        form: {
            id: null,
            name: '',
            email: '',
            role_id: '',
            status: '1'
        },

        openCreate() {
            this.open = true;
            this.isEdit = false;
            this.formAction = "{{ route('users.store') }}";
            this.resetForm();
        },

        openEdit(user) {
            this.open = true;
            this.isEdit = true;
            this.formAction = "{{ url('users') }}/" + user.id;

            this.form = {
                id: user.id,
                name: user.name,
                email: user.email,
                role_id: user.role_id,
                status: user.status ? '1' : '0'
            };
        },

        close() {
            this.open = false;
        },

        resetForm() {
            this.form = {
                id: null,
                name: '',
                email: '',
                role_id: '',
                status: '1'
            };
        }
    }));


    // 🔥 EMPLOYEES MODAL
    Alpine.data('employeeModal', () => ({
        open: false,
        isEdit: false,
        formAction: '',
        users: @json(isset($users) ? $users : []),
        availableUsers: [],

        form: {
            id: null,
            user_id: '',
            first_name: '',
            last_name: '',
            phone: '',
            specialty: '',
            commission: '',
            status: '1',
            work_start: '',
            work_end: '',
            days_off: []
        },

        openCreate() {
            this.open = true;
            this.isEdit = false;
            this.formAction = "{{ route('employees.store') }}";
            this.resetForm();

            this.availableUsers = this.users.filter(u => u.employee === null);
        },

        openEdit(emp) {
            this.open = true;
            this.isEdit = true;
            this.formAction = "{{ url('employees') }}/" + emp.id;

            this.form = {
                id: emp.id,
                user_id: emp.user_id ? String(emp.user_id) : '',
                first_name: emp.first_name,
                last_name: emp.last_name,
                phone: emp.phone ?? '',
                specialty: emp.specialty ?? '',
                commission: emp.commission ?? '',
                status: emp.status ? '1' : '0',
                work_start: emp.work_start ?? '',
                work_end: emp.work_end ?? '',
                days_off: emp.days_off ?? []
            };

            this.availableUsers = this.users.filter(u =>
                u.employee === null || u.id === emp.user_id
            );
        },

        close() {
            this.open = false;
        },

        resetForm() {
            this.form = {
                id: null,
                user_id: '',
                first_name: '',
                last_name: '',
                phone: '',
                specialty: '',
                commission: '',
                status: '1',
                work_start: '',
                work_end: '',
                days_off: []
            };
            this.availableUsers = [];
        }
    }));

// 🔥 CATEGORY MODAL
Alpine.data('categoryModal', () => ({
    open: false,
    isEdit: false,
    formAction: '',

    form: {
        id: null,
        name: '',
        description: '',
        status: '1'
    },

    openCreate() {
        this.open = true;
        this.isEdit = false;
        this.formAction = "{{ route('service-categories.store') }}";
        this.resetForm();
    },

    openEdit(category) {
        this.open = true;
        this.isEdit = true;
        this.formAction = `/service-categories/${category.id}`; // URL dinámica

        this.form = {
            id: category.id,
            name: category.name,
            description: category.description ?? '',
            status: category.status ? '1' : '0'
        };
    },

    close() {
        this.open = false;
    },

    resetForm() {
        this.form = {
            id: null,
            name: '',
            description: '',
            status: '1'
        };
    }
}));

    // 🔥 SERVICIOS MODAL
    @isset($categories)
    Alpine.data('serviceModal', () => ({

        open: false,
        isEdit: false,
        formAction: '',
        categories: @json($categories),

        form: {
            id: null,
            category_id: '',
            name: '',
            description: '',
            price: '',
            duration: '',
            status: 1,
        },

        openCreate() {
            this.open = true;
            this.isEdit = false;
            this.formAction = "{{ route('services.store') }}";
            this.resetForm();

            const existingMethod = document.querySelector('input[name="_method"]');
            if (existingMethod) existingMethod.remove();
        },

        openEdit(service) {
            this.open = true;
            this.isEdit = true;
            this.formAction = "{{ url('services') }}/" + service.id;

            this.form = {
                id: service.id,
                category_id: service.category_id,
                name: service.name,
                description: service.description ?? '',
                price: service.price ?? '',
                duration: service.duration,
                status: service.status ? 1 : 0,
            };
        },

        close() {
            this.open = false;
        },

        resetForm() {
            this.form = {
                id: null,
                category_id: '',
                name: '',
                description: '',
                price: '',
                duration: '',
                status: 1,
            };
        },

        submitForm(event) {

            this.form.status = Number(this.form.status);

            Object.keys(this.form).forEach(key => {
                let field = event.target.querySelector(`[name="${key}"]`);

                if (field) {
                    field.value = this.form[key];
                } else {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key;
                    input.value = this.form[key];
                    event.target.appendChild(input);
                }
            });

            event.target.submit();
        }

    }));
    @endisset
//cite modal
 Alpine.data('citeModal', () => ({
    open: false,
    isEdit: false,
    formAction: '',

    // 📅 fecha actual
    today: new Date().toISOString().split('T')[0],

    form: {
        id: null,
        client_id: '',
        employee_id: '',
        service_id: '',
        duration: 0,
        date: '',
        start_time: '',
        end_time: '',
        status: 'pending'
    },

    openCreate() {
        this.open = true;
        this.isEdit = false;
        this.formAction = "{{ route('cites.store') }}";
        this.resetForm();
    },

    openEdit(cite) {
        this.open = true;
        this.isEdit = true;
        this.formAction = "{{ url('cites') }}/" + cite.id;

        this.form = {
            id: cite.id,
            client_id: cite.client_id ? String(cite.client_id) : '',
            employee_id: cite.employee_id ? String(cite.employee_id) : '',
            service_id: cite.service_id ? String(cite.service_id) : '',
            duration: cite.service?.duration ?? 0,
            date: cite.date ?? '',
            start_time: cite.start_time ?? '',
            end_time: cite.end_time ?? '',
            status: cite.status ?? 'pending'
        };
    },

    // 🔥 duración del servicio
    setDuration(event) {
        const selected = event.target.options[event.target.selectedIndex];
        this.form.duration = parseInt(selected.dataset.duration) || 0;
        this.calculateEndTime();
    },

    // ⏰ hora actual real (sin errores de formato)
    get nowTime() {
        return new Date().toTimeString().slice(0, 5);
    },

    // 📅 validar si es hoy
    isToday() {
        return this.form.date === this.today;
    },

    // ⚙️ VALIDACIÓN REAL FRONTEND
    validateStartTime() {
        if (!this.form.date || !this.form.start_time) return;

        if (this.isToday()) {

            const now = this.nowTime;

            // ⛔ si es menor a hora actual → corregir
            if (this.form.start_time < now) {
                this.form.start_time = now;
            }
        }

        this.calculateEndTime();
    },

    // ⏱ calcular hora fin
    calculateEndTime() {
        if (!this.form.start_time || !this.form.duration) return;

        let [h, m] = this.form.start_time.split(':').map(Number);

        let total = h * 60 + m + this.form.duration;

        let endH = Math.floor(total / 60);
        let endM = total % 60;

        this.form.end_time =
            String(endH).padStart(2, '0') + ':' +
            String(endM).padStart(2, '0');
    },

    // 🔁 cuando cambia fecha
    onDateChange() {
        if (!this.isToday()) return;

        this.validateStartTime();
    },

    close() {
        this.open = false;
    },

    resetForm() {
        this.form = {
            id: null,
            client_id: '',
            employee_id: '',
            service_id: '',
            duration: 0,
            date: '',
            start_time: '',
            end_time: '',
            status: 'pending'
        };
    }
}));

 // 🔥 CLIENTE MODAL
Alpine.data('clientModal', () => ({
    open: false,
    isEdit: false,
    formAction: '',

    form: {
        id: null,
        first_name: '',
        last_name: '',
        phone: '',
        email: '',
        notes: ''
    },

    openCreate() {
        this.open = true;
        this.isEdit = false;
        this.formAction = @json(route('clients.store'));
        this.resetForm();
    },

    openEdit(client) {
        this.open = true;
        this.isEdit = true;
        this.formAction = `/clients/${client.id}`;

        this.form = {
            id: client.id,
            first_name: client.first_name,
            last_name: client.last_name ?? '',
            phone: client.phone ?? '',
            email: client.email ?? '',
            notes: client.notes ?? ''
        };
    },

    close() {
        this.open = false;
    },

    resetForm() {
        this.form = {
            id: null,
            first_name: '',
            last_name: '',
            phone: '',
            email: '',
            notes: ''
        };
    }
}));

{{-- 🔥 CAROUSEL MODAL --}}
Alpine.data('carouselModal', () => ({
    open: false,
    editMode: false,
    formAction: '',

    form: {
        id: null,
        title: '',
        subtitle: '',
        description: '',
        button_text: '',
        button_link: '',
        position: 0,
        status: true
    },

    openCreate() {
        this.open = true;
        this.editMode = false;
        this.formAction = "{{ route('carousel.store') }}";
        this.resetForm();
    },

    editSlide(slide) {
        this.open = true;
        this.editMode = true;
        this.formAction = "{{ url('carousel') }}/" + slide.id;

        this.form = {
            id: slide.id,
            title: slide.title ?? '',
            subtitle: slide.subtitle ?? '',
            description: slide.description ?? '',
            button_text: slide.button_text ?? '',
            button_link: slide.button_link ?? '',
            position: slide.position ?? 0,
            status: slide.status ? true : false
        };
    },

    closeModal() {
        this.open = false;
    },

    resetForm() {
        this.form = {
            id: null,
            title: '',
            subtitle: '',
            description: '',
            button_text: '',
            button_link: '',
            position: 0,
            status: true
        };
    }
}));

// 🔥 BUSINESS SETTING MODAL
Alpine.store('bsModal', {
    open: false,
    editMode: false,
    formAction: '',

    form: {
        id: null,
        business_name: '',
        logo: '',
        address: '',
        district: '',
        city: '',
        reference: '',
        phone: '',
        whatsapp: '',
        email: '',
        google_maps_url: '',
        latitude: '',
        longitude: '',
        opening_hours: '',
        facebook: '',
        instagram: '',
        tiktok: '',
        about_text: ''
    },

    openCreate() {
        this.editMode = false;
        this.formAction = "{{ route('direccion.store') }}";
        this.resetForm();
        this.open = true;
    },

    editSetting(setting) {
        this.editMode = true;
        this.formAction = "{{ url('direccion') }}/" + setting.id;
        this.form = {
            id: setting.id,
            business_name: setting.business_name ?? '',
            logo: setting.logo ?? '',
            address: setting.address ?? '',
            district: setting.district ?? '',
            city: setting.city ?? '',
            reference: setting.reference ?? '',
            phone: setting.phone ?? '',
            whatsapp: setting.whatsapp ?? '',
            email: setting.email ?? '',
            google_maps_url: setting.google_maps_url ?? '',
            latitude: setting.latitude ?? '',
            longitude: setting.longitude ?? '',
            opening_hours: setting.opening_hours ?? '',
            facebook: setting.facebook ?? '',
            instagram: setting.instagram ?? '',
            tiktok: setting.tiktok ?? '',
            about_text: setting.about_text ?? ''
        };
        this.open = true;
    },

    closeModal() {
        this.open = false;
    },

    resetForm() {
        this.form = {
            id: null, business_name: '', logo: '', address: '',
            district: '', city: '', reference: '', phone: '',
            whatsapp: '', email: '', google_maps_url: '',
            latitude: '', longitude: '', opening_hours: '',
            facebook: '', instagram: '', tiktok: '', about_text: ''
        };
    }
});

{{-- 🔥 GALLERY MODAL --}}
@isset($services)
Alpine.data('galleryModal', () => ({

    open: false,
    isEdit: false,
    formAction: '',

    services: @json($services),

    form: {
        id: null,
        service_id: '',
        title: '',
        description: '',
        status: '1'
    },

    // 🔹 Obtener nombre del servicio seleccionado
    get selectedServiceName() {

        const service = this.services.find(
            s => s.id == this.form.service_id
        );

        return service ? service.name : 'Servicio no seleccionado';
    },

    // 🔥 Crear
    openCreate() {

        this.open = true;
        this.isEdit = false;

        this.formAction = "{{ route('gallery.store') }}";

        this.resetForm();

        const existingMethod = document.querySelector(
            'input[name="_method"]'
        );

        if (existingMethod) existingMethod.remove();
    },

    // 🔥 Editar
    openEdit(gallery) {

        this.open = true;
        this.isEdit = true;

        this.formAction = "{{ url('gallery') }}/" + gallery.id;

        this.form = {
            id: gallery.id,
            service_id: gallery.service_id
                ? String(gallery.service_id)
                : '',

            title: gallery.title ?? '',
            description: gallery.description ?? '',
            status: gallery.status ? '1' : '0'
        };
    },

    // ❌ Cerrar
    close() {
        this.open = false;
    },

    // 🔄 Reset
    resetForm() {

        this.form = {
            id: null,
            service_id: '',
            title: '',
            description: '',
            status: '1'
        };
    }

}));
@endisset

});
</script>