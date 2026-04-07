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


    // 🔥 USERS MODAL (NUEVO)
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
                status: '1',
                specialty: ''
            };
        }
    }));
// 🔥 EMPLOYEES MODAL (NUEVO)
  Alpine.data('employeeModal', () => ({
        open: false,
        isEdit: false,
        formAction: '',
        users: @json(isset($users) ? $users : []),      // Todos los usuarios Staff con relación employee
        availableUsers: [],         // Usuarios filtrados para el select

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

        // Abrir modal para crear
        openCreate() {
            this.open = true;
            this.isEdit = false;
            this.formAction = "{{ route('employees.store') }}";
            this.resetForm();

            // Solo usuarios libres
            this.availableUsers = this.users.filter(u => u.employee === null);
        },

        // Abrir modal para editar
        openEdit(emp) {
            this.open = true;
            this.isEdit = true;
            this.formAction = "{{ url('employees') }}/" + emp.id;

            // Copiar datos al formulario
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

            // Filtrar usuarios disponibles + el usuario actual
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
});
</script>