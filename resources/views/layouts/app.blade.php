<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            display: flex;
            min-height: 100vh;
            background: #f4f6fb;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #1e2a3a;
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0;
            z-index: 100;
            transition: width 0.3s;
        }

        .sidebar-brand {
            padding: 1.5rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            width: 36px; height: 36px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 18px; flex-shrink: 0;
        }

        .brand-name {
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        /* ===== USER CARD ===== */
        .sidebar-user {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .user-avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f093fb, #f5576c);
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 700;
            color: white; flex-shrink: 0;
        }

        .user-info .user-name {
            color: #fff;
            font-size: 0.875rem;
            font-weight: 600;
            line-height: 1.2;
        }

        .user-info .user-role {
            color: rgba(255,255,255,0.45);
            font-size: 0.75rem;
        }

        /* ===== NAV ===== */
        .sidebar-nav {
            flex: 1;
            padding: 1rem 0.75rem;
            overflow-y: auto;
        }

        .nav-section-title {
            color: rgba(255,255,255,0.3);
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 0.5rem 0.5rem 0.25rem;
            margin-top: 0.5rem;
        }

        .nav-link-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.75rem;
            border-radius: 10px;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            margin-bottom: 2px;
            position: relative;
        }

        .nav-link-item i {
            font-size: 18px;
            flex-shrink: 0;
            width: 20px;
            text-align: center;
        }

        .nav-link-item:hover {
            background: rgba(255,255,255,0.07);
            color: #fff;
            text-decoration: none;
        }

        .nav-link-item.active {
            background: linear-gradient(135deg, #667eea22, #764ba222);
            color: #a78bfa;
            border: 1px solid rgba(167,139,250,0.2);
        }

        .nav-link-item.active i {
            color: #a78bfa;
        }

        .nav-badge {
            margin-left: auto;
            background: #667eea;
            color: #fff;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 1px 7px;
            border-radius: 20px;
            min-width: 20px;
            text-align: center;
        }

        .nav-badge.green { background: #28a745; }
        .nav-badge.red   { background: #dc3545; }

        /* ===== SIDEBAR FOOTER ===== */
        .sidebar-footer {
            padding: 0.75rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        .btn-logout {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            width: 100%;
            padding: 0.6rem 0.75rem;
            background: rgba(220,53,69,0.1);
            border: 1px solid rgba(220,53,69,0.2);
            border-radius: 10px;
            color: #f87171;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background: rgba(220,53,69,0.2);
        }

        /* ===== MAIN CONTENT ===== */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            padding: 0.875rem 1.75rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .topbar-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1e2a3a;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .btn-new-task {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .btn-new-task:hover {
            opacity: 0.9;
            color: #fff;
            text-decoration: none;
        }

        /* ===== PAGE CONTENT ===== */
        .page-content {
            padding: 1.75rem;
            flex: 1;
        }

        /* ===== FLASH MESSAGES ===== */
        .flash-success {
            background: #d1fae5;
            color: #065f46;
            border-left: 4px solid #10b981;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar { width: 0; overflow: hidden; }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

{{-- ===== SIDEBAR ===== --}}
<aside class="sidebar">

    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="brand-icon">📋</div>
        <span class="brand-name">Task Manager</span>
    </div>

    {{-- User info --}}
    @auth
    <div class="sidebar-user">
        <div class="user-avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
        </div>
        <div class="user-info">
            <div class="user-name">{{ auth()->user()->name }}</div>
            <div class="user-role">{{ auth()->user()->email }}</div>
        </div>
    </div>
    @endauth

    {{-- Navigation --}}
    <nav class="sidebar-nav">

        <div class="nav-section-title">Principal</div>

        <a href="{{ route('tasks.index') }}"
           class="nav-link-item {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
            <i class="ti ti-layout-dashboard"></i>
            Tableau de bord
        </a>

        <a href="{{ route('tasks.index') }}?filter=pending"
           class="nav-link-item {{ request()->query('filter') === 'pending' ? 'active' : '' }}">
            <i class="ti ti-clock"></i>
            En cours
            @php $pending = auth()->check() ? auth()->user()->tasks()->where('completed', false)->count() : 0; @endphp
            @if($pending > 0)
                <span class="nav-badge">{{ $pending }}</span>
            @endif
        </a>

        <a href="{{ route('tasks.index') }}?filter=completed"
           class="nav-link-item {{ request()->query('filter') === 'completed' ? 'active' : '' }}">
            <i class="ti ti-circle-check"></i>
            Terminées
            @php $done = auth()->check() ? auth()->user()->tasks()->where('completed', true)->count() : 0; @endphp
            @if($done > 0)
                <span class="nav-badge green">{{ $done }}</span>
            @endif
        </a>

        <a href="{{ route('tasks.create') }}"
           class="nav-link-item {{ request()->routeIs('tasks.create') ? 'active' : '' }}">
            <i class="ti ti-plus"></i>
            Nouvelle tâche
        </a>

        <div class="nav-section-title">Compte</div>

        <a href="{{ route('profile.edit') }}"
           class="nav-link-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <i class="ti ti-user-circle"></i>
            Mon profil
        </a>

        <a href="{{ route('dashboard') }}"
           class="nav-link-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="ti ti-chart-bar"></i>
            Statistiques
        </a>

    </nav>

    {{-- Footer logout --}}
    @auth
    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                <i class="ti ti-logout" style="font-size:18px;"></i>
                Déconnexion
            </button>
        </form>
    </div>
    @endauth

</aside>

{{-- ===== MAIN ===== --}}
<div class="main-wrapper">

    {{-- Topbar --}}
    <div class="topbar">
        <span class="topbar-title">
            @yield('page-title', 'Mes Tâches')
        </span>
        <div class="topbar-actions">
            @auth
            <a href="{{ route('tasks.create') }}" class="btn-new-task">
                <i class="ti ti-plus" style="font-size:16px;"></i>
                Nouvelle tâche
            </a>
            @endauth
        </div>
    </div>

    {{-- Page content --}}
    <main class="page-content">

        @if(session('success'))
            <div class="flash-success">
                <i class="ti ti-circle-check" style="font-size:18px;"></i>
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
