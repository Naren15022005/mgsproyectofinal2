document.addEventListener('DOMContentLoaded', function () {
    // Sidebar functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarClose = document.getElementById('sidebarClose');
    const sidebar = document.getElementById('sidebar');
    const body = document.body;

    if (sidebarToggle && sidebarClose && sidebar) {
        const overlay = document.createElement('div');
        overlay.className = 'sidebar-overlay';
        body.appendChild(overlay);

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        sidebarToggle.addEventListener('click', toggleSidebar);
        sidebarClose.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 992 && sidebar.classList.contains('active')) {
                toggleSidebar();
            }
        });
    }

    // Search functionality
    const searchButton = document.getElementById('searchButton');
    const searchBar = document.getElementById('searchBar');

    if (searchButton && searchBar) {
        const searchInput = searchBar.querySelector('input');

        let searchTimeout;
        searchButton.addEventListener('click', function () {
            searchBar.classList.toggle('expanded');
            if (searchBar.classList.contains('expanded')) {
                searchInput.focus();
            }
        });

        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimeout);
        });

        searchInput.addEventListener('blur', function () {
            searchTimeout = setTimeout(() => {
                searchBar.classList.remove('expanded');
            }, 3000);
        });
    }

    // Export functionality
    const exportButton = document.getElementById('exportButton');
    const exportOptions = document.getElementById('exportOptions');

    if (exportButton && exportOptions) {
        exportButton.addEventListener('click', function () {
            const rect = exportButton.getBoundingClientRect();
            exportOptions.style.top = `${rect.bottom + window.scrollY}px`;
            exportOptions.style.left = `${rect.left + window.scrollX}px`;
            exportOptions.style.display = exportOptions.style.display === 'none' ? 'block' : 'none';
        });
    }

    // Select all checkboxes
    const selectAllCheckbox = document.getElementById('select_all');
    const rowCheckboxes = document.querySelectorAll('.selectRow');

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function () {
            rowCheckboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    }

    // Format currency
    function formatCurrency(cells) {
        cells.forEach(cell => {
            const value = parseFloat(cell.textContent);
            if (!isNaN(value)) {
                const formatted = value.toLocaleString('es-CO', {
                    style: 'currency',
                    currency: 'COP',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 2,
                });
                cell.textContent = formatted;
            }
        });
    }

    formatCurrency(document.querySelectorAll('.table-custom td.monto'));
    formatCurrency(document.querySelectorAll('.table-custom td.precio'));

 // Filter functionality de ingresos
const filterButton = document.getElementById('filterButton');
const filterOptions = document.getElementById('filterOptions');
const filterByCategoryCheckbox = document.getElementById('filterByCategory');
const filterByTypeCheckbox = document.getElementById('filterByType');
const filterByRoleCheckbox = document.getElementById('filterByRole'); // Nuevo checkbox para rol
const categoryFilter = document.getElementById('categoryFilter');
const typeFilter = document.getElementById('typeFilter');
const roleFilter = document.getElementById('roleFilter');
const applyFilterButton = document.getElementById('applyFilterButton');

if (filterButton && filterOptions) {
    filterButton.addEventListener('click', function () {
        const rect = filterButton.getBoundingClientRect();
        filterOptions.style.top = `${rect.bottom + window.scrollY}px`;
        filterOptions.style.left = `${rect.left + window.scrollX}px`;
        filterOptions.style.display = filterOptions.style.display === 'none' ? 'block' : 'none';
    });

    // Mostrar/ocultar filtros según checkboxes
    if (filterByCategoryCheckbox) {
        filterByCategoryCheckbox.addEventListener('change', function () {
            categoryFilter.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (filterByTypeCheckbox) {
        filterByTypeCheckbox.addEventListener('change', function () {
            typeFilter.style.display = this.checked ? 'block' : 'none';
        });
    }

    // Nuevo: Mostrar filtro de roles cuando su checkbox está marcado
    if (filterByRoleCheckbox) {
        filterByRoleCheckbox.addEventListener('change', function () {
            roleFilter.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (applyFilterButton) {
        applyFilterButton.addEventListener('click', function () {
            const selectedCategory = filterByCategoryCheckbox.checked ? categoryFilter.value : "";
            const selectedType = filterByTypeCheckbox.checked ? typeFilter.value : "";
            const selectedRole = filterByRoleCheckbox.checked ? roleFilter.value : "";
            const rows = document.querySelectorAll('.table-custom tbody tr');

            rows.forEach(row => {
                const categoryCell = row.querySelector('td:nth-child(7)');
                const typeCell = row.querySelector('td:nth-child(3)');
                const roleSpan = row.querySelector('.role');
                
                // Verificar coincidencia con categoría
                const matchesCategory = selectedCategory === "" || 
                                      (categoryCell && categoryCell.textContent.trim() === selectedCategory);
                
                // Verificar coincidencia con tipo
                const matchesType = selectedType === "" || 
                                  (typeCell && typeCell.textContent.trim() === selectedType);
                
                // Verificar coincidencia con rol
                const matchesRole = selectedRole === "" || 
                                  (roleSpan && roleSpan.textContent.trim() === selectedRole);
                
                // Mostrar fila solo si cumple con todos los filtros aplicables
                row.style.display = matchesCategory && matchesType && matchesRole ? '' : 'none';
            });

            filterOptions.style.display = 'none';
        });
    }
}

    // Modal functionality
    const modal = document.getElementById('miModal');
    if (modal) {
        function abrirModal() {
            modal.style.display = 'block';
        }

        function cerrarModal() {
            modal.style.display = 'none';
        }

        document.addEventListener('click', function (e) {
            if (e.target === modal) {
                cerrarModal();
            }
        });

        const form = document.getElementById('addOpcionForm');
        if (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                const formData = new FormData(this);

                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });
        }


    }

 // Filtrado de clientes por género - versión dinámica
const clientFilterButton = document.getElementById('clientFilterButton');
const clientFilterOptions = document.getElementById('clientFilterOptions');
const clientFilterByGenderCheckbox = document.getElementById('clientFilterByGender');
const clientGenderFilter = document.getElementById('clientGenderFilter');
const clientApplyFilterButton = document.getElementById('clientApplyFilterButton');

if (clientFilterButton && clientFilterOptions) {
    // Función para cargar géneros únicos de la tabla
    function loadUniqueGenders() {
        const genderCells = document.querySelectorAll('#clientTable tbody td:nth-child(9)');
        const uniqueGenders = new Set();
        
        // Añadir la opción "Todos"
        uniqueGenders.add("");
        
        // Recopilar géneros únicos de la tabla
        genderCells.forEach(cell => {
            const gender = cell.textContent.trim();
            if (gender) {
                uniqueGenders.add(gender);
            }
        });
        
        // Limpiar opciones actuales
        clientGenderFilter.innerHTML = '';
        
        // Añadir la opción "Todos"
        const allOption = document.createElement('option');
        allOption.value = "";
        allOption.textContent = "Todos";
        clientGenderFilter.appendChild(allOption);
        
        // Añadir opciones para cada género único
        uniqueGenders.forEach(gender => {
            if (gender !== "") {
                const option = document.createElement('option');
                option.value = gender;
                option.textContent = gender;
                clientGenderFilter.appendChild(option);
            }
        });
    }

    // Cargar géneros al hacer clic en el botón de filtro
    clientFilterButton.addEventListener('click', function () {
        const rect = clientFilterButton.getBoundingClientRect();
        clientFilterOptions.style.top = `${rect.bottom + window.scrollY}px`;
        clientFilterOptions.style.left = `${rect.left + window.scrollX}px`;
        
        // Si vamos a mostrar las opciones, primero cargar los géneros
        if (clientFilterOptions.style.display === 'none') {
            loadUniqueGenders();
        }
        
        clientFilterOptions.style.display = clientFilterOptions.style.display === 'none' ? 'block' : 'none';
    });

    // Mostrar/ocultar filtro de género según checkbox
    if (clientFilterByGenderCheckbox) {
        clientFilterByGenderCheckbox.addEventListener('change', function () {
            clientGenderFilter.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (clientApplyFilterButton) {
        clientApplyFilterButton.addEventListener('click', function () {
            const selectedGender = clientFilterByGenderCheckbox.checked ? clientGenderFilter.value : "";
            const rows = document.querySelectorAll('#clientTable tbody tr');

            rows.forEach(row => {
                const genderCell = row.querySelector('td:nth-child(9)'); // Género está en la columna 9
                
                // Verificar coincidencia con género
                const matchesGender = selectedGender === "" || 
                                     (genderCell && genderCell.textContent.trim() === selectedGender);
                
                // Mostrar fila solo si cumple con el filtro
                row.style.display = matchesGender ? '' : 'none';
            });

            clientFilterOptions.style.display = 'none';
        });
    }
}

//filtrado por productos
// Filtrado de productos - versión dinámica
const productoFilterButton = document.getElementById('filterButtonProductos');
const productoFilterOptions = document.getElementById('filterOptionsProductos');
const filterByCategoryProductos = document.getElementById('filterByCategoryProductos');
const categoryFilterProductos = document.getElementById('categoryFilterProductos');
const filterByEstadoProductos = document.getElementById('filterByEstadoProductos');
const estadoFilterProductos = document.getElementById('estadoFilterProductos');
const applyFilterButtonProductos = document.getElementById('applyFilterButtonProductos');

if (productoFilterButton && productoFilterOptions) {
    // Función para cargar categorías únicas de la tabla
    function loadUniqueCategories() {
        const categoryCells = document.querySelectorAll('.table-custom tbody td:nth-child(8)');
        const uniqueCategories = new Set();
        
        // Añadir la opción "Todas"
        uniqueCategories.add("");
        
        // Recopilar categorías únicas de la tabla
        categoryCells.forEach(cell => {
            const category = cell.textContent.trim();
            if (category) {
                uniqueCategories.add(category);
            }
        });
        
        // Limpiar opciones actuales
        categoryFilterProductos.innerHTML = '';
        
        // Añadir la opción "Todas"
        const allOption = document.createElement('option');
        allOption.value = "";
        allOption.textContent = "Todas";
        categoryFilterProductos.appendChild(allOption);
        
        // Añadir opciones para cada categoría única
        uniqueCategories.forEach(category => {
            if (category !== "") {
                const option = document.createElement('option');
                option.value = category;
                option.textContent = category;
                categoryFilterProductos.appendChild(option);
            }
        });
    }

    // Función para cargar estados únicos de la tabla
    function loadUniqueEstados() {
        const estadoCells = document.querySelectorAll('.table-custom tbody td:nth-child(7)');
        const uniqueEstados = new Set();
        
        // Añadir la opción "Todos"
        uniqueEstados.add("");
        
        // Recopilar estados únicos de la tabla
        estadoCells.forEach(cell => {
            const estado = cell.textContent.trim();
            if (estado) {
                uniqueEstados.add(estado);
            }
        });
        
        // Limpiar opciones actuales
        estadoFilterProductos.innerHTML = '';
        
        // Añadir la opción "Todos"
        const allOption = document.createElement('option');
        allOption.value = "";
        allOption.textContent = "Todos";
        estadoFilterProductos.appendChild(allOption);
        
        // Añadir opciones para cada estado único
        uniqueEstados.forEach(estado => {
            if (estado !== "") {
                const option = document.createElement('option');
                option.value = estado;
                option.textContent = estado;
                estadoFilterProductos.appendChild(option);
            }
        });
    }

    // Cargar opciones al hacer clic en el botón de filtro
    productoFilterButton.addEventListener('click', function () {
        const rect = productoFilterButton.getBoundingClientRect();
        productoFilterOptions.style.top = `${rect.bottom + window.scrollY}px`;
        productoFilterOptions.style.left = `${rect.left + window.scrollX}px`;
        
        // Si vamos a mostrar las opciones, primero cargar los datos
        if (productoFilterOptions.style.display === 'none') {
            loadUniqueCategories();
            loadUniqueEstados();
        }
        
        productoFilterOptions.style.display = productoFilterOptions.style.display === 'none' ? 'block' : 'none';
    });

    // Mostrar/ocultar filtros según checkboxes
    if (filterByCategoryProductos) {
        filterByCategoryProductos.addEventListener('change', function () {
            categoryFilterProductos.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (filterByEstadoProductos) {
        filterByEstadoProductos.addEventListener('change', function () {
            estadoFilterProductos.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (applyFilterButtonProductos) {
        applyFilterButtonProductos.addEventListener('click', function () {
            const selectedCategory = filterByCategoryProductos.checked ? categoryFilterProductos.value : "";
            const selectedEstado = filterByEstadoProductos.checked ? estadoFilterProductos.value : "";
            const rows = document.querySelectorAll('.table-custom tbody tr');

            rows.forEach(row => {
                const categoryCell = row.querySelector('td:nth-child(8)'); // Categoría está en la columna 8
                const estadoCell = row.querySelector('td:nth-child(7)');   // Estado está en la columna 7
                
                // Verificar coincidencia con categoría
                const matchesCategory = selectedCategory === "" || 
                                       (categoryCell && categoryCell.textContent.trim() === selectedCategory);
                
                // Verificar coincidencia con estado
                const matchesEstado = selectedEstado === "" || 
                                     (estadoCell && estadoCell.textContent.trim() === selectedEstado);
                
                // Mostrar fila solo si cumple con todos los filtros aplicados
                row.style.display = (matchesCategory && matchesEstado) ? '' : 'none';
            });

            productoFilterOptions.style.display = 'none';
        });
    }
}

//filtro de usuarios por rol
const userFilterButton = document.getElementById('filterButtonUsuarios');
const userFilterOptions = document.getElementById('filterOptionsUsuarios');
const filterByRoleCheckboxx = document.getElementById('filterByRoleUsuarios');
const roleFilterSelect = document.getElementById('roleFilterUsuarios');
const applyFilterButtonUsuarios = document.getElementById('applyFilterButtonUsuarios');

if (userFilterButton && userFilterOptions) {
    function loadUniqueRoles() {
        const roleCells = document.querySelectorAll('.table-custom tbody td:nth-child(5)');
        const uniqueRoles = new Set();
        uniqueRoles.add(""); // Para la opción "Todos los roles"

        roleCells.forEach(cell => {
            const rol = cell.textContent.trim();
            if (rol) uniqueRoles.add(rol);
        });

        roleFilterSelect.innerHTML = '';

        const allOption = document.createElement('option');
        allOption.value = "";
        allOption.textContent = "Todos los roles";
        roleFilterSelect.appendChild(allOption);

        uniqueRoles.forEach(rol => {
            if (rol !== "") {
                const option = document.createElement('option');
                option.value = rol;
                option.textContent = rol;
                roleFilterSelect.appendChild(option);
            }
        });
    }

    userFilterButton.addEventListener('click', function () {
        const rect = userFilterButton.getBoundingClientRect();
        userFilterOptions.style.top = `${rect.bottom + window.scrollY}px`;
        userFilterOptions.style.left = `${rect.left + window.scrollX}px`;

        if (userFilterOptions.style.display === 'none') {
            loadUniqueRoles(); // Cargar solo al abrir
        }

        userFilterOptions.style.display = userFilterOptions.style.display === 'none' ? 'block' : 'none';
    });

    if (filterByRoleCheckboxx) {
        filterByRoleCheckboxx.addEventListener('change', function () {
            roleFilterSelect.style.display = this.checked ? 'block' : 'none';
        });
    }

    if (applyFilterButtonUsuarios) {
        applyFilterButtonUsuarios.addEventListener('click', function () {
            const selectedRole = filterByRoleCheckboxx.checked ? roleFilterSelect.value : "";
            const rows = document.querySelectorAll('.table-custom tbody tr');

            rows.forEach(row => {
                const rolCell = row.querySelector('td:nth-child(5)');
                const matchesRol = selectedRole === "" || 
                    (rolCell && rolCell.textContent.trim() === selectedRole);

                row.style.display = matchesRol ? '' : 'none';
            });

            userFilterOptions.style.display = 'none';
        });
    }
}


});

    



//filtrar por sexo en clientes
