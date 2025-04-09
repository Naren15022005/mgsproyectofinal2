@extends('layouts.app')

@section('content')
@push('styles')
<style>
    :root {
        --primary: {{ $config->primary_color ?? '#2A2F35' }};
        --accent: {{ $config->accent_color ?? '#00C9A7' }};
        --sidebar-bg: {{ $config->sidebar_color ?? '#2A2F35' }};
        --sidebar-text: {{ $config->sidebar_text_color ?? '#FFFFFF' }};
    }
    
    .config-container {
        max-width: 1000px;
        margin: 2rem auto;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.1);
    }
    
    .config-header {
        display: flex;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid #eee;
    }
    
    .config-icon {
        width: 50px;
        height: 50px;
        background: var(--accent);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        font-size: 1.5rem;
    }
    
    .section-card {
        background: #F9FAFB;
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #eee;
        transition: all 0.3s;
    }
    
    .section-card:hover {
        box-shadow: 0 5px 15px rgba(0,201,167,0.1);
    }
    
    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .section-icon {
        width: 40px;
        height: 40px;
        background: rgba(0,201,167,0.1);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: var(--accent);
    }
    
    .logo-upload {
        border: 2px dashed #ddd;
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: white;
    }
    
    .logo-upload:hover {
        border-color: var(--accent);
        background: rgba(0,201,167,0.05);
    }
    
    .logo-preview {
        max-width: 200px;
        max-height: 100px;
        margin-bottom: 1rem;
        object-fit: contain;
    }
    
    .sidebar-preview {
        background: var(--sidebar-bg);
        color: var(--sidebar-text);
        padding: 1.5rem;
        border-radius: 10px;
        margin-top: 1rem;
        display: flex;
        align-items: center;
        transition: all 0.3s;
    }
    
    .sidebar-logo-preview {
        max-width: 40px;
        max-height: 40px;
        margin-right: 1rem;
    }
    
    .color-picker {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        border: 2px solid #eee;
    }
    
    .form-switch .form-check-input {
        width: 3em;
        height: 1.5em;
    }
</style>
@endpush

<div class="config-container">
    <!-- Header -->
    <div class="config-header">
        <div class="config-icon">
            <i class="fas fa-cog"></i>
        </div>
        <div>
            <h1 style="font-weight: 700; margin-bottom: 0.25rem;">Configuración del Sistema</h1>
            <p style="color: #6c757d;">Personaliza la apariencia y funcionamiento de tu gimnasio</p>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Main Config Form -->
    <form action="{{ route('admin.configuracion.update') }}" method="POST" enctype="multipart/form-data" id="configForm">
        @csrf
        @method('PUT')

        <!-- Visual Identity Section -->
        <div class="section-card">
            <div class="section-header">
                <div class="section-icon">
                    <i class="fas fa-palette"></i>
                </div>
                <h3 style="margin-bottom: 0;">Identidad Visual</h3>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="logo-upload" onclick="document.getElementById('logo').click()">
                        <img id="logo-preview" 
                            src="{{ $config->site_logo ? asset('storage/'.$config->site_logo) : asset('images/placeholder-logo.png') }}" 
                            class="logo-preview" alt="Logo">
                        <p class="text-muted mt-2">Haz clic para cambiar el logo</p>
                        <input type="file" name="site_logo" id="logo" style="display: none;" 
                            onchange="previewLogo(this, 'logo-preview')">
                    </div>
                    
                    <div class="sidebar-preview mt-3" id="sidebarPreview">
                        <img id="sidebar-logo-preview" 
                             src="{{ $config->site_logo ? asset('storage/'.$config->site_logo) : asset('images/placeholder-logo.png') }}" 
                             class="sidebar-logo-preview">
                        <span id="sidebar-name-preview">{{ $config->site_name ?? 'Nombre Empresa' }}</span>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label">Nombre del Gimnasio</label>
                        <input type="text" class="form-control" name="site_name" id="siteNameInput"
                               value="{{ old('site_name', $config->site_name ?? 'Muscle Gym Sport') }}"
                               oninput="updateSidebarPreview()">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Eslogan</label>
                        <input type="text" class="form-control" name="site_slogan"
                               value="{{ old('site_slogan', $config->site_slogan ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Favicon</label>
                        <input type="file" class="form-control" name="site_favicon" 
                               onchange="previewLogo(this, 'favicon-preview')">
                        @if($config->site_favicon ?? false)
                        <img id="favicon-preview" src="{{ asset('storage/'.$config->site_favicon) }}" width="32" class="mt-2">
                        @else
                        <img id="favicon-preview" src="{{ asset('images/placeholder-favicon.png') }}" width="32" class="mt-2" style="display: none;">
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Colors Section -->
        <div class="section-card">
            <div class="section-header">
                <div class="section-icon">
                    <i class="fas fa-fill-drip"></i>
                </div>
                <h3 style="margin-bottom: 0;">Personalización de Colores</h3>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Color Primario</label>
                    <div class="d-flex align-items-center">
                        <input type="color" class="color-picker me-3" name="primary_color" 
                               value="{{ $config->primary_color ?? '#2A2F35' }}" 
                               onchange="updateColor('--primary', this.value)">
                        <span id="primary-color-text">{{ $config->primary_color ?? '#2A2F35' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Color de Acento</label>
                    <div class="d-flex align-items-center">
                        <input type="color" class="color-picker me-3" name="accent_color" 
                               value="{{ $config->accent_color ?? '#00C9A7' }}"
                               onchange="updateColor('--accent', this.value); document.getElementById('accent-color-text').textContent = this.value;">
                        <span id="accent-color-text">{{ $config->accent_color ?? '#00C9A7' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Color del Sidebar</label>
                    <div class="d-flex align-items-center">
                        <input type="color" class="color-picker me-3" name="sidebar_color" 
                               value="{{ $config->sidebar_color ?? '#2A2F35' }}"
                               onchange="updateSidebarColor(this.value)">
                        <span id="sidebar-color-text">{{ $config->sidebar_color ?? '#2A2F35' }}</span>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Texto del Sidebar</label>
                    <div class="d-flex align-items-center">
                        <input type="color" class="color-picker me-3" name="sidebar_text_color" 
                               value="{{ $config->sidebar_text_color ?? '#FFFFFF' }}"
                               onchange="updateSidebarTextColor(this.value)">
                        <span id="sidebar-text-color-text">{{ $config->sidebar_text_color ?? '#FFFFFF' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="section-card">
            <div class="section-header">
                <div class="section-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 style="margin-bottom: 0;">Información de Contacto</h3>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email_contact"
                           value="{{ old('email_contact', $config->email_contact ?? '') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" class="form-control" name="phone_contact"
                           value="{{ old('phone_contact', $config->phone_contact ?? '') }}">
                </div>
                <div class="col-12 mb-3">
                    <label class="form-label">Dirección</label>
                    <textarea class="form-control" name="address" rows="2">{{ old('address', $config->address ?? '') }}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Horario de Atención</label>
                    <input type="text" class="form-control" name="business_hours"
                           value="{{ old('business_hours', $config->business_hours ?? 'Lun-Vie 8:00 AM - 8:00 PM') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Redes Sociales (Facebook)</label>
                    <input type="url" class="form-control" name="social_facebook"
                           value="{{ old('social_facebook', $config->social_facebook ?? '') }}">
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <button type="button" class="btn btn-danger" onclick="confirmReset()">
                <i class="fas fa-undo me-2"></i> Restablecer todo
            </button>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i> Guardar Cambios
            </button>
        </div>
    </form>

    <!-- Reset Form (separate form) -->
    <form action="{{ route('admin.configuracion.reset') }}" method="POST" id="resetForm" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Image preview functions
    function previewLogo(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                
                if(previewId === 'logo-preview') {
                    document.getElementById('sidebar-logo-preview').src = e.target.result;
                }
            }
            
            reader.readAsDataURL(file);
        }
    }
    
    // Update sidebar name preview
    function updateSidebarPreview() {
        const name = document.getElementById('siteNameInput').value;
        document.getElementById('sidebar-name-preview').textContent = name || 'Nombre Empresa';
    }
    
    // Update colors in real-time
    function updateColor(cssVar, value) {
        document.documentElement.style.setProperty(cssVar, value);
        if (cssVar === '--primary') {
            document.getElementById('primary-color-text').textContent = value;
        } else if (cssVar === '--accent') {
            document.getElementById('accent-color-text').textContent = value;
        }
    }
    
    function updateSidebarColor(value) {
        document.documentElement.style.setProperty('--sidebar-bg', value);
        document.getElementById('sidebarPreview').style.background = value;
        document.getElementById('sidebar-color-text').textContent = value;
    }
    
    function updateSidebarTextColor(value) {
        document.documentElement.style.setProperty('--sidebar-text', value);
        document.getElementById('sidebarPreview').style.color = value;
        document.getElementById('sidebar-text-color-text').textContent = value;
    }
    
    // Reset confirmation
    function confirmReset() {
        Swal.fire({
            title: '¿Restablecer configuración?',
            text: "¡Se eliminarán todos los datos y archivos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirmar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('resetForm').submit();
            }
        });
    }

    // Initialize values on page load
    document.addEventListener('DOMContentLoaded', () => {
        const config = @json($config ?? null);
        
        if (config) {
            updateColor('--primary', config.primary_color || '#2A2F35');
            updateColor('--accent', config.accent_color || '#00C9A7');
            updateSidebarColor(config.sidebar_color || '#2A2F35');
            updateSidebarTextColor(config.sidebar_text_color || '#FFFFFF');
        }
        updateSidebarPreview();
    });
</script>
@endpush
@endsection