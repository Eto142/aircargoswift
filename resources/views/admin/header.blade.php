<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Logistics Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary: #0d5fb8;
            --primary-dark: #084a8a;
            --secondary: #6c757d;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --sidebar-width: 260px;
            --sidebar-collapsed: 0px;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fb;
            color: #333;
            font-size: 0.95rem;
            transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Enhanced Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 3px 0 15px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transform: translateX(0);
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
            transform: translateX(-100%);
        }

        /* New Toggle Button - Large Square at Top */
        .sidebar-toggle-container {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
        }

        .sidebar-toggle {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 12px;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 6px 25px rgba(13, 95, 184, 0.3);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(13, 95, 184, 0.4);
        }

        .sidebar-toggle:active {
            transform: scale(0.95);
        }

        /* Hide toggle when sidebar is collapsed */
        .sidebar:not(.collapsed) ~ .sidebar-toggle-container {
            display: none;
        }

        /* Show toggle button inside sidebar when expanded */
        .sidebar-toggle-inner {
            display: block;
        }

        .sidebar.collapsed .sidebar-toggle-inner {
            display: none;
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-header .navbar-brand img {
            width: 60px;
            transition: width 0.3s;
        }

        .admin-profile {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: white;
            flex-shrink: 0;
        }

        .admin-info h6 {
            margin: 0;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .admin-info small {
            opacity: 0.8;
            font-size: 0.8rem;
        }

        .sidebar-nav {
            padding: 20px 0;
        }

        .nav-item {
            margin: 2px 10px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 15px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            transition: all 0.2s;
            position: relative;
            font-size: 0.95rem;
        }

        .nav-link:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
            padding-left: 25px;
        }

        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.15);
            font-weight: 500;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: white;
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            font-size: 1.3rem;
            width: 30px;
            text-align: center;
            flex-shrink: 0;
        }

        .nav-text {
            font-size: 1rem;
            font-weight: 500;
        }

        .sidebar-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px 15px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
        }

        /* Main Content */
        .main-content {
            margin-left: 0;
            padding: 25px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh;
            position: relative;
        }

        .sidebar:not(.collapsed) ~ .main-content {
            margin-left: var(--sidebar-width);
            padding-left: 45px;
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar:not(.collapsed) + .sidebar-overlay {
            opacity: 1;
            visibility: visible;
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
        }

        .page-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            margin: 0;
        }

        .header-actions {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 1.2rem;
            cursor: pointer;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--danger);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .stat-icon.shipments { background: rgba(13, 95, 184, 0.1); color: var(--primary); }
        .stat-icon.transit { background: rgba(255, 193, 7, 0.1); color: var(--warning); }
        .stat-icon.delivered { background: rgba(40, 167, 69, 0.1); color: var(--success); }
        .stat-icon.pending { background: rgba(220, 53, 69, 0.1); color: var(--danger); }

        .stat-content h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            line-height: 1;
        }

        .stat-content p {
            color: var(--secondary);
            margin: 5px 0 0 0;
            font-size: 0.9rem;
        }

        .stat-trend {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
            margin-top: 8px;
        }

        .trend-up { color: var(--success); }
        .trend-down { color: var(--danger); }

        /* Charts Section */
        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        @media (max-width: 1200px) {
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h5 {
            font-weight: 600;
            margin: 0;
        }

        /* Recent Shipments Table */
        .table-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
        }

        .table-header {
            padding: 20px;
            border-bottom: 1px solid #eaeaea;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h5 {
            font-weight: 600;
            margin: 0;
        }

        .table-actions {
            display: flex;
            gap: 10px;
        }

        .table-container {
            overflow-x: auto;
        }

        .table {
            margin: 0;
        }

        .table thead th {
            background: #f8f9fa;
            color: var(--dark);
            font-weight: 600;
            padding: 15px;
            border-bottom: 2px solid #eaeaea;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            border-color: #eaeaea;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .status-pending { background: #fff3cd; color: #856404; }
        .status-processing { background: #cce5ff; color: #004085; }
        .status-transit { background: #d1ecf1; color: #0c5460; }
        .status-delivered { background: #d4edda; color: #155724; }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #eaeaea;
            margin-bottom: 30px;
        }

        .quick-actions h5 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 15px;
            background: #f8f9fa;
            border: 1px solid #eaeaea;
            border-radius: 10px;
            color: var(--dark);
            text-decoration: none;
            transition: all 0.2s;
        }

        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            border-color: var(--primary);
        }

        .action-btn i {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar:not(.collapsed) {
                transform: translateX(0);
                width: 280px;
            }
            
            .sidebar:not(.collapsed) ~ .main-content {
                margin-left: 0;
            }
            
            .sidebar-toggle-container {
                top: 15px;
                left: 15px;
            }
            
            .sidebar-toggle {
                width: 50px;
                height: 50px;
            }
            
            .charts-section {
                grid-template-columns: 1fr;
            }
        }

        @media (min-width: 769px) {
            .sidebar-overlay {
                display: none !important;
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Sidebar scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Inner Toggle Button (Visible when sidebar is open) -->
        <div class="sidebar-toggle-inner">
            <div class="sidebar-header">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Aircargoswift Logo" width="60px">
                </a>
                <button class="sidebar-toggle" onclick="toggleSidebar()">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>

        <div class="admin-profile">
            <div class="admin-avatar">
                {{ strtoupper(substr(auth()->guard('admin')->user()->name, 0, 1)) }}
            </div>
            <div class="admin-info">
                <h6>{{ auth()->guard('admin')->user()->name }}</h6>
                <small>Super Admin</small>
            </div>
        </div>

        <div class="sidebar-nav">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="bi bi-speedometer2 nav-icon"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('admin.book') }}" class="nav-link">
                    <i class="bi bi-box-seam nav-icon"></i>
                    <span class="nav-text">Book Cargo</span>
                </a>
            </div>

            <div class="nav-item">
                <a href="{{ route('admin.shipments') }}" class="nav-link">
                    <i class="bi bi-box-seam nav-icon"></i>
                    <span class="nav-text"> View Shipments</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.send.email') }}" class="nav-link">
                    <i class="bi bi-envelope nav-icon"></i>
                    <span class="nav-text">Send Email</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.change.password') }}" class="nav-link">
                    <i class="bi bi-gear nav-icon"></i>
                    <span class="nav-text">Change Password</span>
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center gap-2">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="nav-text">Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>

    <!-- Toggle Button Container (Fixed at top left) -->
    <div class="sidebar-toggle-container">
        <button class="sidebar-toggle" onclick="toggleSidebar()">
            <i class="bi bi-list"></i>
        </button>
    </div>

 
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle sidebar function
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.querySelector('.main-content');
        const overlay = document.querySelector('.sidebar-overlay');
        
        sidebar.classList.toggle('collapsed');
        
        // Close sidebar on mobile when clicking overlay
        if (window.innerWidth < 768 && overlay) {
            if (!sidebar.classList.contains('collapsed')) {
                overlay.style.opacity = '1';
                overlay.style.visibility = 'visible';
            } else {
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
            }
        }
    }
    
    // Make function globally available
    window.toggleSidebar = toggleSidebar;
    
    // Add click animation to toggle button
    const toggleBtns = document.querySelectorAll('.sidebar-toggle');
    toggleBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Add click effect
            this.style.transform = 'scale(0.95)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    });
    
    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const toggleContainer = document.querySelector('.sidebar-toggle-container');
        
        if (window.innerWidth < 768 && 
            !sidebar.contains(e.target) && 
            !toggleContainer.contains(e.target) &&
            !sidebar.classList.contains('collapsed')) {
            toggleSidebar();
        }
    });
    
    // Handle responsive behavior
    function handleResponsiveSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        
        if (window.innerWidth < 768) {
            // Mobile: Start with collapsed sidebar
            sidebar.classList.add('collapsed');
            if (overlay) {
                overlay.style.opacity = '0';
                overlay.style.visibility = 'hidden';
            }
        } else {
            // Desktop: Show sidebar by default
            sidebar.classList.remove('collapsed');
        }
    }
    
    // Initial check
    handleResponsiveSidebar();
    
    // Check on resize
    window.addEventListener('resize', handleResponsiveSidebar);
    
    // Add keyboard shortcut (Esc) to close sidebar
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const sidebar = document.getElementById('sidebar');
            if (window.innerWidth < 768 && !sidebar.classList.contains('collapsed')) {
                toggleSidebar();
            }
        }
    });
    
    // Add smooth transitions
    const style = document.createElement('style');
    style.textContent = `
        * {
            transition-property: transform, opacity, visibility, margin-left, width !important;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1) !important;
            transition-duration: 300ms !important;
        }
    `;
    document.head.appendChild(style);
});
</script>
</body>
</html>