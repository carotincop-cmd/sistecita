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

});
</script>