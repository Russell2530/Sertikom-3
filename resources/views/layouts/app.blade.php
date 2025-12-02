<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Pendataan Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Premium dark theme with Poppins font, enhanced animations, better mobile support */
        :root {
            --primary: #0a0a0a;
            --secondary: #1a1a1a;
            --tertiary: #2d2d2d;
            --quaternary: #3a3a3a;
            --quinary: #4a4a4a;
            --accent: #ffffff;
            --accent-hover: #f5f5f5;
            --accent-light: rgba(255, 255, 255, 0.1);
            --success: #22c55e;
            --warning: #eab308;
            --danger: #ef4444;
            --text-primary: #ffffff;
            --text-secondary: #e0e0e0;
            --text-tertiary: #b0b0b0;
            --border: #404040;
            --border-light: rgba(255, 255, 255, 0.1);
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.5);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.6);
            --shadow-lg: 0 8px 32px rgba(0, 0, 0, 0.7);
        }

        * {
            font-family: 'Poppins', 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: var(--text-primary);
            overflow-x: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh;
        }

        /* Enhanced sidebar with smooth animations and premium styling */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--secondary) 0%, var(--tertiary) 100%);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            border-right: 1px solid var(--border);
            box-shadow: 8px 0 32px rgba(0, 0, 0, 0.4);
        }

        .sidebar .nav-link {
            color: var(--text-secondary);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 14px 18px;
            border-radius: 10px;
            margin: 8px 14px;
            border-left: 3px solid transparent;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, var(--accent-light), transparent);
            transition: left 0.6s ease;
        }

        .sidebar .nav-link:hover::before {
            left: 100%;
        }

        .sidebar .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: var(--accent);
            border-left-color: var(--accent);
            transform: translateX(6px);
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.2);
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.05) 100%);
            color: var(--accent);
            border-left-color: var(--accent);
            box-shadow: 0 4px 20px rgba(255, 255, 255, 0.25);
            font-weight: 600;
        }

        .sidebar .nav-link i {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 1.1rem;
        }

        .sidebar .nav-link:hover i,
        .sidebar .nav-link.active i {
            transform: scale(1.2) translateX(3px);
            color: var(--accent);
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(6px);
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        .sidebar.show {
            transform: translateX(0);
            box-shadow: 12px 0 40px rgba(0, 0, 0, 0.6);
        }

        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                width: 280px;
                height: 100vh;
                z-index: 1050;
                transform: translateX(-100%);
            }

            .mobile-sidebar-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background: linear-gradient(135deg, var(--secondary) 0%, var(--tertiary) 100%);
                border-bottom: 1px solid var(--border);
                padding: 1.5rem 1.25rem;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            }

            .main-content {
                margin-left: 0 !important;
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            }

            body.sidebar-open .main-content {
                filter: blur(3px);
                pointer-events: none;
            }
        }

        @media (min-width: 769px) {
            .sidebar {
                transform: translateX(0) !important;
            }

            .mobile-sidebar-header {
                display: none !important;
            }
        }

        .btn-sidebar-close {
            color: var(--text-secondary);
            font-size: 1.4rem;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid var(--accent-light);
            border-radius: 10px;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .btn-sidebar-close:hover {
            background: var(--accent);
            color: var(--primary);
            transform: rotate(90deg) scale(1.1);
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.4);
        }

        /* Modern navbar with premium styling */
        .navbar {
            background: var(--secondary) !important;
            border-bottom: 1px solid var(--border);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
            padding: 1rem 0;
        }

        .navbar-toggler {
            border: 1px solid var(--border);
            padding: 8px 14px;
            border-radius: 10px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.08);
        }

        .navbar-toggler:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.4);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.35rem;
            color: var(--accent) !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            letter-spacing: 0.8px;
            text-shadow: 0 2px 8px rgba(255, 255, 255, 0.2);
        }

        .navbar-brand:hover {
            transform: translateY(-3px);
            text-shadow: 0 4px 12px rgba(255, 255, 255, 0.4);
        }

        /* Improved dropdown menu styling */
        .dropdown-menu {
            background: var(--tertiary) !important;
            border: 1px solid var(--border) !important;
            border-radius: 12px;
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.4);
            animation: slideDown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 8px;
        }

        .dropdown-item {
            color: var(--text-secondary) !important;
            transition: all 0.3s ease;
            padding: 12px 16px;
            border-radius: 6px;
            margin: 4px 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.1) !important;
            color: var(--accent) !important;
            transform: translateX(4px);
            padding-left: 18px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced card styling with premium looks */
        .card {
            background: linear-gradient(135deg, rgba(26, 31, 46, 0.8) 0%, rgba(37, 45, 61, 0.8) 100%);
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: var(--shadow-md);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .card:hover {
            box-shadow: var(--shadow-lg), 0 0 30px rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-6px);
        }

        .card-header {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.1) 0%, transparent 100%);
            border-bottom: 1px solid var(--border);
            color: var(--text-primary);
            padding: 1.5rem;
            font-weight: 600;
        }

        .card-body {
            padding: 1.5rem;
            color: var(--text-secondary);
        }

        /* Badge and color styling */
        .badge {
            transition: all 0.3s ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 6px 12px;
            border-radius: 8px;
        }

        .badge:hover {
            transform: scale(1.08);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .bg-danger {
            background: var(--danger) !important;
        }

        .bg-success {
            background: var(--success) !important;
        }

        .bg-warning {
            background: var(--warning) !important;
        }

        /* Alert styling with animations */
        .alert {
            border: 1px solid var(--border);
            border-radius: 12px;
            animation: slideInDown 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1) !important;
            border-color: var(--success) !important;
            color: var(--success) !important;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1) !important;
            border-color: var(--danger) !important;
            color: var(--danger) !important;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Enhanced buttons with premium styling */
        .btn {
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 0.65rem 1.3rem;
            border: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, #f5f5f5 100%);
            color: var(--primary);
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.2);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(255, 255, 255, 0.35);
            color: var(--primary);
        }

        .btn-secondary {
            background: var(--tertiary);
            color: var(--text-secondary);
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.08);
            color: var(--accent);
            border-color: var(--accent);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.3);
        }

        .btn-info {
            background: rgba(255, 255, 255, 0.15);
            color: var(--accent);
            border: 1px solid var(--accent);
        }

        .btn-info:hover {
            background: var(--accent);
            color: var(--primary);
            box-shadow: 0 4px 16px rgba(255, 255, 255, 0.35);
        }

        .btn-warning {
            background: rgba(245, 179, 8, 0.15);
            color: var(--warning);
            border: 1px solid var(--warning);
        }

        .btn-warning:hover {
            background: var(--warning);
            color: white;
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.15);
            color: var(--danger);
            border: 1px solid var(--danger);
        }

        .btn-danger:hover {
            background: var(--danger);
            color: white;
        }

        /* Form controls with premium styling */
        .form-control,
        .form-select {
            background: var(--tertiary) !important;
            border: 1px solid var(--border) !important;
            color: var(--text-primary) !important;
            border-radius: 10px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.85rem 1.1rem;
        }

        .form-control:focus,
        .form-select:focus {
            background: rgba(255, 255, 255, 0.05) !important;
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1) !important;
            color: var(--text-primary) !important;
        }

        .form-control::placeholder {
            color: var(--text-tertiary);
            opacity: 0.6;
        }

        .form-label {
            color: var(--text-secondary);
            font-weight: 600;
            margin-bottom: 0.8rem;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Table styling with better mobile support */
        .table {
            color: var(--text-secondary);
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            background: rgba(255, 255, 255, 0.08);
            color: var(--accent);
            border-bottom: 2px solid var(--border);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1.1rem !important;
        }

        .table td {
            border-bottom: 1px solid var(--border);
            padding: 0.95rem 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05)
        }

        .table-striped tbody tr:hover {
            background: rgba(255, 255, 255, 0.05) !important;
            color: var(--text-primary);
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--tertiary);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-hover);
        }

        .mobile-menu-title {
            color: var(--accent);
            font-size: 1.35rem;
            font-weight: 700;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            letter-spacing: 1px;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sidebar.show .nav-item {
            animation: slideInLeft 0.4s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }

        .sidebar.show .nav-item:nth-child(1) { animation-delay: 0.05s; }
        .sidebar.show .nav-item:nth-child(2) { animation-delay: 0.1s; }
        .sidebar.show .nav-item:nth-child(3) { animation-delay: 0.15s; }
        .sidebar.show .nav-item:nth-child(4) { animation-delay: 0.2s; }
        .sidebar.show .nav-item:nth-child(5) { animation-delay: 0.25s; }
        .sidebar.show .nav-item:nth-child(6) { animation-delay: 0.3s; }
        .sidebar.show .nav-item:nth-child(7) { animation-delay: 0.35s; }
        .sidebar.show .nav-item:nth-child(8) { animation-delay: 0.4s; }

        /* Mobile optimizations */
        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1rem;
                letter-spacing: 0.3px;
            }
            
            .btn {
                padding: 0.55rem 0.9rem;
                font-size: 0.75rem;
            }
            
            .card-body {
                padding: 1rem;
            }

            .sidebar {
                width: 260px;
            }

            .table th,
            .table td {
                padding: 0.7rem 0.6rem !important;
                font-size: 0.85rem;
            }
        }

        /* Pagination styling */
        .pagination .page-link {
            background: var(--tertiary);
            border: 1px solid var(--border);
            color: var(--text-secondary);
            transition: all 0.3s ease;
        }

        .pagination .page-link:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="mobile-sidebar-header">
                    <h5 class="mobile-menu-title">Menu Navigasi</h5>
                    <button class="btn-sidebar-close" type="button" id="mobileSidebarClose" aria-label="Tutup menu">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </a>
                        </li>
                        @if(Auth::user()->role !== 'siswa')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('tahun-ajar*') ? 'active' : '' }}" href="{{ route('tahun-ajar.index') }}">
                                <i class="fas fa-calendar-alt"></i>
                                Tahun Ajar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('jurusan*') ? 'active' : '' }}" href="{{ route('jurusan.index') }}">
                                <i class="fas fa-graduation-cap"></i>
                                Jurusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('kelas*') ? 'active' : '' }}" href="{{ route('kelas.index') }}">
                                <i class="fas fa-school"></i>
                                Kelas
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->role !== 'siswa')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('siswa*') ? 'active' : '' }}" href="{{ route('siswa.index') }}">
                                <i class="fas fa-users"></i>
                                Siswa
                            </a>
                        </li>
                        @endif

                        @if(Auth::user()->role === 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                                <i class="fas fa-user-cog"></i>
                                Manajemen User
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 col-lg-10 main-content">
                <nav class="navbar navbar-expand-lg navbar-light mb-4 shadow-sm">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" id="mobileSidebarToggle" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            <span class="ms-2 d-none d-sm-inline fw-medium">Menu</span>
                        </button>
                        <span class="navbar-brand">Sistem Pendataan Siswa</span>
                        <div class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle me-1"></i>
                                    {{ Auth::user()->name }}
                                    <span class="badge bg-{{ Auth::user()->role === 'admin' ? 'danger' : (Auth::user()->role === 'guru' ? 'warning' : 'success') }}">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
            const mobileSidebarClose = document.getElementById('mobileSidebarClose');
            const navLinks = document.querySelectorAll('#sidebar .nav-link');
            const body = document.body;

            let isSidebarOpen = false;

            mobileSidebarToggle.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                if (!isSidebarOpen) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            });

            mobileSidebarClose.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closeSidebar();
            });

            sidebarOverlay.addEventListener('click', function(e) {
                if (e.target === sidebarOverlay) {
                    closeSidebar();
                }
            });

            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 768) {
                        setTimeout(() => {
                            closeSidebar();
                        }, 300);
                    }
                });
            });

            function openSidebar() {
                sidebar.classList.add('show');
                sidebarOverlay.classList.add('show');
                body.classList.add('sidebar-open');
                mobileSidebarToggle.classList.add('open');
                isSidebarOpen = true;
                body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                sidebar.classList.remove('show');
                sidebarOverlay.classList.remove('show');
                body.classList.remove('sidebar-open');
                mobileSidebarToggle.classList.remove('open');
                isSidebarOpen = false;
                body.style.overflow = '';
            }

            function handleResize() {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                    body.classList.remove('sidebar-open');
                    mobileSidebarToggle.classList.remove('open');
                    body.style.overflow = '';
                    isSidebarOpen = false;
                }
            }

            window.addEventListener('resize', handleResize);

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isSidebarOpen) {
                    closeSidebar();
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
