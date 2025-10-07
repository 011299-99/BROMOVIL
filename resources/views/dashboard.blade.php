<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Panel de Distribuidor') }}
            </h2>
            <span class="text-sm text-slate-500">Bienvenido(a), {{ Auth::user()->name ?? 'Usuario' }}</span>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-b from-slate-50 to-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-10">

            {{-- === BIENVENIDA === --}}
            <div class="bg-white shadow-xl rounded-2xl border border-slate-200">
                <div class="p-8 text-gray-900 text-center">
                    <h3 class="text-3xl font-bold text-[#419cf6] mb-2">¡Bienvenido al Panel Bromovil!</h3>
                    <p class="text-slate-600 text-lg">Administra tus líneas, comisiones y recursos desde una sola plataforma.</p>
                </div>
            </div>

            {{-- === ESTADÍSTICAS RESUMEN === --}}
            <div class="grid md:grid-cols-3 gap-6">
                <div class="card">
                    <div class="icon bg-gradient-to-r from-[#419cf6] to-[#844ff0]"><i class="fas fa-sim-card"></i></div>
                    <div class="text"><h4>Líneas activas</h4><p>12</p></div>
                </div>
                <div class="card">
                    <div class="icon bg-gradient-to-r from-[#22c55e] to-[#16a34a]"><i class="fas fa-wallet"></i></div>
                    <div class="text"><h4>Ganancias del mes</h4><p>$4,820 MXN</p></div>
                </div>
                <div class="card">
                    <div class="icon bg-gradient-to-r from-[#f59e0b] to-[#eab308]"><i class="fas fa-users"></i></div>
                    <div class="text"><h4>Clientes atendidos</h4><p>57</p></div>
                </div>
            </div>

            {{-- === SECCIONES PRINCIPALES === --}}
            <div class="grid md:grid-cols-2 gap-6">
                {{-- 1. Adquisición de paquetes --}}
                <div class="card-section">
                    <h4 class="title">📦 Adquisición de Paquetes de SIMs</h4>
                    <p>Elige entre los modelos disponibles, paga de forma segura y recibe tu guía de envío.</p>
                    <ul class="list">
                        <li>Modelo 1, 2 o 3 con ofertas activas</li>
                        <li>Pago con tarjeta, transferencia o PayPal</li>
                        <li>Confirmación automática por correo</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Comprar Paquetes</a>
                </div>

                {{-- 2. SIPAB --}}
                <div class="card-section">
                    <h4 class="title">🔌 Acceso directo a SIPAB</h4>
                    <p>Gestiona tus SIMs desde la plataforma central.</p>
                    <ul class="list">
                        <li>Recargas de saldo y compra de stock</li>
                        <li>Preactivaciones y portabilidades</li>
                        <li>Consulta de saldos SIPAB</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Entrar a SIPAB</a>
                </div>

                {{-- 3. Gestión de negocio --}}
                <div class="card-section">
                    <h4 class="title">📈 Gestión del Negocio</h4>
                    <p>Administra tus ingresos, líneas y descargas.</p>
                    <ul class="list">
                        <li>Panel de ganancias residuales</li>
                        <li>Historial de comisiones</li>
                        <li>Reportes Excel / PDF</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Ver Mis Ganancias</a>
                </div>

                {{-- 4. Soporte inmediato --}}
                <div class="card-section">
                    <h4 class="title">💬 Soporte Inmediato</h4>
                    <p>Asistencia todos los días de 7 a.m. a 11 p.m.</p>
                    <ul class="list">
                        <li>Chat en vivo y WhatsApp directo</li>
                        <li>FAQ interactivo y videotutoriales</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Abrir Chat</a>
                </div>

                {{-- 5. Mapa de cobertura --}}
                <div class="card-section">
                    <h4 class="title">🗺️ Mapa de Cobertura</h4>
                    <p>Consulta zonas activas y ubica distribuidores cercanos.</p>
                    <ul class="list">
                        <li>Cobertura nacional, EE.UU. y Canadá</li>
                        <li>Geolocalización de distribuidores</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Ver Mapa</a>
                </div>

                {{-- 6. Marketplace interno --}}
                <div class="card-section">
                    <h4 class="title">🛍️ Marketplace de Distribuidores</h4>
                    <p>Compra material POP y merchandising oficial.</p>
                    <ul class="list">
                        <li>Playeras, gorras, stands y lonas</li>
                        <li>Paga con saldo o método tradicional</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Ir al Marketplace</a>
                </div>

                {{-- 7. Capacitación --}}
                <div class="card-section">
                    <h4 class="title">🎓 Capacitación y Recursos</h4>
                    <p>Aprende, crece y domina el sistema Bromovil.</p>
                    <ul class="list">
                        <li>Videos y manuales descargables</li>
                        <li>Agenda de sesiones en Google Meet</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Ver Cursos</a>
                </div>

                {{-- 8. Notificaciones --}}
                <div class="card-section">
                    <h4 class="title">🔔 Experiencia de Usuario</h4>
                    <p>Notificaciones en tiempo real y recordatorios.</p>
                    <ul class="list">
                        <li>Alertas de activaciones y promociones</li>
                        <li>Push y correo electrónico</li>
                    </ul>
                    <a href="#" class="btn-dashboard">Configurar Alertas</a>
                </div>
            </div>

        </div>
    </div>

    {{-- === ESTILOS === --}}
    <style>
        .card {
            background: white;
            border-radius: 1rem;
            border: 1px solid rgba(0,0,0,0.06);
            box-shadow: 0 6px 20px rgba(15,23,42,0.05);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all .25s ease;
        }
        .card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(65,156,246,0.15); }
        .card .icon {
            width: 3.5rem; height: 3.5rem;
            display: flex; align-items: center; justify-content: center;
            border-radius: 1rem;
            color: white; font-size: 1.5rem; flex-shrink: 0;
        }
        .card-section {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            transition: all .25s ease;
        }
        .card-section:hover { transform: translateY(-3px); box-shadow: 0 8px 30px rgba(65,156,246,0.1); }
        .card-section .title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.75rem;
        }
        .card-section .list {
            margin-top: 0.75rem;
            margin-bottom: 1rem;
            color: #475569;
            font-size: 0.95rem;
            list-style-type: disc;
            padding-left: 1.25rem;
        }
        .btn-dashboard {
            display: inline-block;
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            border-radius: 0.75rem;
            background-image: linear-gradient(135deg,#419cf6,#844ff0);
            color: #fff;
            box-shadow: 0 6px 15px rgba(65,156,246,0.25);
            transition: all .3s ease;
        }
        .btn-dashboard:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(65,156,246,0.4);
            filter: brightness(1.05);
        }
    </style>

    {{-- Íconos FontAwesome --}}
    <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
</x-app-layout>
