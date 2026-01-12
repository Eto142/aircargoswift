@include('admin.header')

<style>
    :root {
        --primary-blue: #2563eb;
        --accent-blue: #3b82f6;
        --light-blue: #eff6ff;
        --success-green: #10b981;
        --warning-yellow: #f59e0b;
        --danger-red: #ef4444;
        --neutral-gray: #6b7280;
        --light-gray: #f9fafb;
        --border-gray: #e5e7eb;
        --card-bg: #ffffff;
        --text-dark: #111827;
        --text-light: #6b7280;
    }

    /* Animated Background */
    .dashboard-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: 
            radial-gradient(circle at 10% 20%, rgba(37, 99, 235, 0.03) 0%, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(59, 130, 246, 0.03) 0%, transparent 50%),
            linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        z-index: -1;
    }

    .bg-grid {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            linear-gradient(rgba(59, 130, 246, 0.02) 1px, transparent 1px),
            linear-gradient(90deg, rgba(59, 130, 246, 0.02) 1px, transparent 1px);
        background-size: 40px 40px;
        z-index: -1;
        animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
        0% { transform: translate(0, 0); }
        100% { transform: translate(40px, 40px); }
    }

    /* Main Content */
    .main-content {
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.8s ease-out;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Page Header */
    .page-header {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-gray);
        animation: slideDown 0.6s ease-out;
    }

    @keyframes slideDown {
        from {
            transform: translateY(-10px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .page-header h1 {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, var(--primary-blue), var(--accent-blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-header .text-muted {
        color: var(--neutral-gray) !important;
        font-size: 0.95rem;
    }

    .header-actions {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .notification-btn {
        position: relative;
        background: white;
        border: 1px solid var(--border-gray);
        border-radius: 8px;
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-blue);
        transition: all 0.3s ease;
    }

    .notification-btn:hover {
        background: var(--light-blue);
        border-color: var(--accent-blue);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.1);
    }

    .notification-badge {
        position: absolute;
        top: -6px;
        right: -6px;
        background: var(--danger-red);
        color: white;
        font-size: 0.7rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.1); }
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.5rem;
        animation: gridAppear 0.6s ease-out 0.2s both;
    }

    @keyframes gridAppear {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-gray);
        animation: cardFloat 3s infinite ease-in-out;
        animation-delay: calc(var(--i) * 0.1s);
    }

    .stat-card:nth-child(1) { --i: 0; }
    .stat-card:nth-child(2) { --i: 1; }
    .stat-card:nth-child(3) { --i: 2; }
    .stat-card:nth-child(4) { --i: 3; }

    @keyframes cardFloat {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, var(--primary-blue), var(--accent-blue));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover::before {
        opacity: 1;
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        border-color: var(--primary-blue);
        box-shadow: 0 8px 24px rgba(37, 99, 235, 0.15);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .stat-icon.shipments {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        color: var(--primary-blue);
        border: 1px solid #bfdbfe;
    }

    .stat-icon.transit {
        background: linear-gradient(135deg, #fffbeb, #fef3c7);
        color: var(--warning-yellow);
        border: 1px solid #fde68a;
    }

    .stat-icon.delivered {
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        color: var(--success-green);
        border: 1px solid #a7f3d0;
    }

    .stat-icon.pending {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        color: var(--danger-red);
        border: 1px solid #fecaca;
    }

    .stat-content h3 {
        font-size: 2rem;
        font-weight: 800;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
        transition: all 0.3s ease;
    }

    .stat-card:hover .stat-content h3 {
        color: var(--primary-blue);
        transform: scale(1.05);
    }

    .stat-content p {
        color: var(--neutral-gray);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }

    .stat-trend {
        font-size: 0.8rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .trend-up {
        color: var(--success-green);
    }

    .trend-down {
        color: var(--danger-red);
    }

    /* Alert */
    .alert-success {
        background: linear-gradient(135deg, #ecfdf5, #d1fae5);
        border: 1px solid #a7f3d0;
        border-left: 4px solid var(--success-green);
        color: #065f46;
        border-radius: 8px;
        animation: slideInRight 0.5s ease-out;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-gray);
        animation: fadeIn 0.6s ease-out 0.4s both;
        opacity: 0;
    }

    @keyframes fadeIn {
        to { opacity: 1; }
    }

    .quick-actions h5 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .quick-actions h5::before {
        content: '';
        width: 4px;
        height: 20px;
        background: var(--primary-blue);
        border-radius: 2px;
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .action-btn {
        background: white;
        border: 1px solid var(--border-gray);
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        color: var(--text-dark);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .action-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, 
            transparent, 
            rgba(37, 99, 235, 0.05), 
            transparent);
        transition: 0.5s;
    }

    .action-btn:hover::before {
        left: 100%;
    }

    .action-btn:hover {
        background: var(--light-blue);
        border-color: var(--primary-blue);
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.1);
    }

    .action-btn i {
        font-size: 2rem;
        color: var(--primary-blue);
        transition: all 0.3s ease;
    }

    .action-btn:hover i {
        transform: scale(1.2) rotate(10deg);
        color: var(--accent-blue);
    }

    .action-btn span {
        font-size: 0.9rem;
        font-weight: 500;
        text-align: center;
    }

    /* Table Card */
    .table-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        border: 1px solid var(--border-gray);
        animation: fadeIn 0.6s ease-out 0.6s both;
        opacity: 0;
    }

    .table-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--border-gray);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: var(--light-gray);
    }

    .table-header h5 {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .table-header h5::before {
        content: '';
        width: 4px;
        height: 20px;
        background: var(--primary-blue);
        border-radius: 2px;
    }

    .table-actions {
        display: flex;
        gap: 0.75rem;
    }

    .table-actions .btn {
        background: white;
        border: 1px solid var(--border-gray);
        color: var(--primary-blue);
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .table-actions .btn:hover {
        background: var(--light-blue);
        border-color: var(--primary-blue);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.1);
    }

    .table-container {
        overflow-x: auto;
    }

    .table {
        margin: 0;
        color: var(--text-dark);
        border-collapse: separate;
        border-spacing: 0;
    }

    .table thead th {
        background: var(--light-gray);
        border-bottom: 2px solid var(--border-gray);
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.85rem;
        color: var(--primary-blue);
        padding: 1rem 1.5rem;
        white-space: nowrap;
    }

    .table tbody td {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--border-gray);
        vertical-align: middle;
        transition: all 0.3s ease;
    }

    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background: var(--light-blue);
    }

    .table tbody tr:hover td {
        transform: translateX(4px);
    }

    .table tbody td strong {
        color: var(--text-dark);
        font-weight: 600;
        font-family: 'Roboto Mono', monospace;
        letter-spacing: 0.5px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
        text-transform: capitalize;
    }

    .status-processing {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: var(--primary-blue);
    }

    .status-delivered {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: var(--success-green);
    }

    .status-transit {
        background: #fffbeb;
        border: 1px solid #fde68a;
        color: var(--warning-yellow);
    }

    .status-pending {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: var(--danger-red);
    }

    .table .d-flex.gap-1 {
        gap: 0.5rem !important;
    }

    .table .btn {
        font-size: 0.8rem;
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        white-space: nowrap;
    }

    .table .btn-primary {
        background: var(--light-blue);
        border: 1px solid #bfdbfe;
        color: var(--primary-blue);
    }

    .table .btn-primary:hover {
        background: #dbeafe;
        border-color: var(--primary-blue);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(37, 99, 235, 0.15);
    }

    .table .btn-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: var(--danger-red);
    }

    .table .btn-danger:hover {
        background: #fee2e2;
        border-color: #f87171;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(239, 68, 68, 0.15);
    }

    .table .btn i {
        font-size: 0.8rem;
    }

    .border-top {
        border-top: 1px solid var(--border-gray) !important;
        padding: 1rem 1.5rem;
        background: var(--light-gray);
    }

    .border-top .btn-link {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .border-top .btn-link:hover {
        color: var(--accent-blue);
        transform: translateX(5px);
    }

    .border-top .btn-link i {
        transition: transform 0.3s ease;
    }

    .border-top .btn-link:hover i {
        transform: translateX(5px);
    }

    /* Dropdown Styling */
    .dropdown-menu {
        background: white;
        border: 1px solid var(--border-gray);
        border-radius: 8px;
        padding: 0.5rem 0;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        color: var(--text-dark);
        padding: 0.5rem 1rem;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background: var(--light-blue);
        color: var(--primary-blue);
    }

    /* Buttons */
    .btn-outline-secondary {
        border: 1px solid var(--border-gray);
        color: var(--neutral-gray);
        background: white;
    }

    .btn-outline-secondary:hover {
        background: var(--light-gray);
        border-color: var(--primary-blue);
        color: var(--primary-blue);
    }

    /* Form Controls */
    .btn-close {
        opacity: 0.5;
        transition: opacity 0.2s ease;
    }

    .btn-close:hover {
        opacity: 1;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            gap: 1.5rem;
            text-align: center;
        }
        
        .header-actions {
            flex-direction: column;
            width: 100%;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .action-grid {
            grid-template-columns: 1fr;
        }
        
        .table-header {
            flex-direction: column;
            gap: 1rem;
            text-align: center;
        }
        
        .table-actions {
            width: 100%;
            justify-content: center;
        }
        
        .table tbody td {
            padding: 0.75rem;
        }
        
        .table .d-flex.gap-1 {
            flex-direction: column;
            gap: 0.25rem !important;
        }
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    ::-webkit-scrollbar-track {
        background: var(--light-gray);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb {
        background: var(--primary-blue);
        border-radius: 3px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--accent-blue);
    }
</style>

<!-- Animated Background -->
<div class="dashboard-bg"></div>
<div class="bg-grid"></div>

<!-- Main Content -->
<div class="main-content">
    <!-- Header -->
    <div class="page-header">
        <div>
            <h1>Dashboard Overview</h1>
            <p class="text-muted mb-0">Welcome back! Here's what's happening with your shipments today.</p>
        </div>
     
       
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon shipments">
                <i class="bi bi-truck"></i>
            </div>
            <div class="stat-content">
                <h3>{{ $totalShipments }}</h3>
                <p>Total Shipments</p>
                <div class="stat-trend trend-up">
                    <!-- Add trend data here -->
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon transit">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-content">
                <h3>{{ $inTransit }}</h3>
                <p>In Transit</p>
                <div class="stat-trend trend-up">
                    <!-- Add trend data here -->
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon delivered">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-content">
                <h3>{{ $delivered }}</h3>
                <p>Delivered</p>
                <div class="stat-trend trend-up">
                    <!-- Add trend data here -->
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon pending">
                <i class="bi bi-exclamation-circle"></i>
            </div>
            <div class="stat-content">
                <h3>{{ $booked }}</h3>
                <p>Pending Bookings</p>
                <div class="stat-trend trend-down">
                    <!-- Add trend data here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <h5>Quick Actions</h5>
        <div class="action-grid">
            <a href="{{ route('admin.book') }}" class="action-btn">
                <i class="bi bi-plus-circle"></i>
                <span>Book Cargo</span>
            </a>
            <a href="#" class="action-btn">
                <i class="bi bi-file-earmark-text"></i>
                <span>Generate Report</span>
            </a>
            <a href="#" class="action-btn">
                <i class="bi bi-printer"></i>
                <span>Print Labels</span>
            </a>
            <a href="{{ route('admin.send.email') }}" class="action-btn">
                <i class="bi bi-envelope"></i>
                <span>Send Email</span>
            </a>
        </div>
    </div>

    <!-- Recent Shipments Table -->
    <div class="table-card">
        <div class="table-header">
            <h5>Recent Shipments</h5>
            <div class="table-actions">
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-filter me-1"></i> Filter
                </button>
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-download me-1"></i> Export
                </button>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>AWB Number</th>
                        <th>Shipper</th>
                        <th>Receiver</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentShipments as $shipment)
                    <tr>
                        <td><strong>{{ $shipment->awb_number }}</strong></td>
                        <td>{{ $shipment->shipper_company }}</td>
                        <td>{{ $shipment->receiver_company }}</td>
                        <td>{{ $shipment->origin ?? 'N/A' }}</td>
                        <td>{{ $shipment->destination ?? 'N/A' }}</td>
                        <td>
                            @php
                                $statusClass = 'status-processing';
                                if($shipment->status == 'delivered') $statusClass = 'status-delivered';
                                elseif($shipment->status == 'in_transit') $statusClass = 'status-transit';
                                elseif($shipment->status == 'pending') $statusClass = 'status-pending';
                            @endphp
                            <span class="status-badge {{ $statusClass }}">
                                <i class="bi bi-circle-fill" style="font-size: 0.5rem;"></i>
                                {{ ucfirst(str_replace('_', ' ', $shipment->status)) }}
                            </span>
                        </td>
                        <td>{{ $shipment->updated_at }}</td>
                        <td>
                            <div class="d-flex gap-1 flex-wrap">
                                <!-- View Shipment -->
                                <a href="{{ route('admin.shipments.show', $shipment->id) }}" 
                                   class="btn btn-sm btn-primary" 
                                   title="View">
                                    <i class="bi bi-eye me-1"></i> View
                                </a>

                                <!-- Edit Shipment -->
                                <a href="{{ route('shipment.edit', $shipment->id) }}"
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-pencil-square me-1"></i> Edit
                                </a>

                                <!-- Update Shipping History -->
                                <a href="{{ route('shipment.history.edit', $shipment->id) }}"
                                   class="btn btn-sm btn-primary">
                                    <i class="bi bi-clock-history me-1"></i> Update History
                                </a>

                                <!-- Delete Shipment -->
                                <form action="{{ route('shipment.destroy', $shipment->id) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this shipment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="text-muted">
                                <i class="bi bi-inbox" style="font-size: 2rem;"></i>
                                <p class="mt-2 mb-0">No shipments found</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-3 border-top">
            <a href="{{ route('admin.shipments') }}" class="btn btn-link text-decoration-none">
                View All Shipments <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate stat numbers
    const statValues = document.querySelectorAll('.stat-content h3');
    statValues.forEach((stat) => {
        const originalText = stat.textContent;
        stat.textContent = '0';
        
        let start = 0;
        const end = parseInt(originalText);
        const duration = 1500;
        const increment = end / (duration / 16);
        
        const timer = setInterval(() => {
            start += increment;
            if (start >= end) {
                stat.textContent = originalText;
                clearInterval(timer);
            } else {
                stat.textContent = Math.floor(start);
            }
        }, 16);
    });
    
    // Add hover effects to action buttons
    const actionBtns = document.querySelectorAll('.action-btn');
    actionBtns.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.05)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Add animation to table rows
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateX(-20px)';
        
        setTimeout(() => {
            row.style.transition = 'all 0.4s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateX(0)';
        }, index * 100);
    });
    
    // Notification button animation
    const notificationBtn = document.querySelector('.notification-btn');
    if (notificationBtn) {
        notificationBtn.addEventListener('click', function() {
            this.style.transform = 'scale(0.9)';
            setTimeout(() => {
                this.style.transform = 'scale(1)';
            }, 150);
        });
    }
    
    // Add click animation to all buttons
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.95)';
        });
        
        btn.addEventListener('mouseup', function() {
            this.style.transform = 'scale(1)';
        });
        
        btn.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>

@include('admin.footer')