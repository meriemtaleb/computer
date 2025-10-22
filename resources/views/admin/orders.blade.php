<!DOCTYPE html>

<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هامودا شوب - لوحة الإدارة</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361EE;
            --primary-light: #4895EF;
            --secondary: #6C757D;
            --success: #4361EE;
            --danger: #e63946;
            --warning: #F9C74F;
            --light-bg: #F8F9FA;
            --text-dark: #212529;
            --text-light: #6C757D;
            --border: #DEE2E6;
            --white: #FFFFFF;
            --shadow: rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --transition: all 0.3s ease;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
            overflow-x: hidden;
        }
        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            display: flex;
            min-height: 100vh;
            position: relative;
        }
        .alert-success {
            background-color: var(--success);
            color: #FFFFFF;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid var(--success);
        }
        .alert-error {
            background-color: var(--danger);
            color: #FFFFFF;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid var(--danger);
        }
        .sidebar {
            width: 245px;
            background: var(--white);
            box-shadow: 0 0 20px var(--shadow);
            padding: 1.5rem 1rem;
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            z-index: 1000;
            right: 0;
            top: 0;
            overflow-y: auto;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 2rem;
            padding: 0 1rem;
        }
        .logo-icon {
            width: 36px;
            height: 36px;
            background: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            font-size: 16px;
        }
        .logo-text {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--text-dark);
        }
        .sidebar-menu {
            list-style: none;
            margin-top: 2rem;
        }
        .sidebar-menu li {
            margin-bottom: 0.5rem;
        }
        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0.8rem 1rem;
            color: var(--text-light);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
        }
        .sidebar-menu a:hover, .sidebar-menu a.active {
            background-color: var(--primary-light);
            color: var(--white);
        }
        .sidebar-menu i {
            width: 20px;
            text-align: center;
        }
        .main-content {
            flex: 1;
            margin-right: 245px;
            padding: 1rem;
            width: calc(100% - 245px);
            transition: var(--transition);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
        }
        .user-menu {
            display: flex;
            justify-content: start;
            margin-right: auto;
        }
        .user-menu a {
            text-decoration: none;
        }
        .user-avatar {
            padding: 4px;
            width: 50px;
            height: 35px;
            border-radius: 10%;
            background: var(--primary);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .stat-card {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 5px 15px var(--shadow);
            padding: 1.5rem;
            display: flex;
            align-items: center;
            transition: var(--transition);
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px var(--shadow);
        }
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-left: 1rem;
        }
        .orders-icon {
            background-color: rgba(67, 97, 238, 0.2);
            color: var(--primary);
        }
        .products-icon {
            background-color: rgba(76, 201, 240, 0.2);
            color: var(--success);
        }
        .revenue-icon {
            background-color: rgba(249, 199, 79, 0.2);
            color: var(--warning);
        }
        .users-icon {
            background-color: rgba(247, 37, 133, 0.2);
            color: var(--danger);
        }
        .stat-info h4 {
            font-size: 1.8rem;
            margin-bottom: 0.2rem;
        }
        .stat-info p {
            color: var(--text-light);
        }
        .content-section {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 5px 15px var(--shadow);
            padding: 1rem;
            margin-bottom: 2rem;
            transition: var(--transition);
        }
        .content-section:hover {
            box-shadow: 0 10px 25px var(--shadow);
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--border);
        }
        .section-header h2 {
            font-size: 1.5rem;
        }
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        .filter-select {
            padding: 0.75rem;
            border-radius: 8px;
            border: 1px solid var(--border);
            background: var(--white);
            color: var(--text-dark);
            transition: var(--transition);
        }
        .filter-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        .search-box {
            display: flex;
            margin-bottom: 1.5rem;
        }
        .search-box input {
            flex: 1;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px 0 0 8px;
            border-left: none;
            transition: var(--transition);
        }
        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        .search-box button {
            background-color: var(--primary);
            color: var(--white);
            border: none;
            padding: 0 1.25rem;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            transition: var(--transition);
        }
        .search-box button:hover {
            background-color: var(--primary-light);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        th, td {
            padding:0.5rem;
            text-align: right;
            border-bottom: 1px solid var(--border);
        }
        th {
            background-color: var(--light-bg);
            font-weight: 600;
        }
        tr:hover {
            background-color: var(--light-bg);
        }
        .product-cell {
            display: flex;
            align-items: center;
        }
        .product-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            overflow: hidden;
            margin-left: 1rem;
        }
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: var(--transition);
        }
        .status-pending {
            background-color: rgba(249, 199, 79, 0.2);
            color: var(--warning);
        }
        .status-processing {
            background-color: rgba(67, 97, 238, 0.2);
            color: var(--primary);
        }
        .status-shipped {
            background-color: rgba(108, 117, 125, 0.2);
            color: var(--secondary);
        }
        .status-delivered {
            background-color: rgba(76, 201, 240, 0.2);
            color: var(--success);
        }
        .status-cancelled {
            background-color: rgba(247, 37, 133, 0.2);
            color: var(--danger);
        }
        .action-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: var(--white);
            transition: var(--transition);
            margin-left: 0.5rem;
        }
        .action-btn:hover {
            transform: scale(1.1);
        }
        .edit-btn {
            background-color: var(--primary);
        }
        .delete-btn {
            background-color: var(--danger);
        }
              .pagination {
            display: flex;
            justify-content: center;
            margin-top: 1.5rem;
        }
        .pagination button {
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border: 1px solid var(--border);
            background-color: var(--white);
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
        }
        .pagination button:hover, .pagination button.active {
            background-color: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }
        .product-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--white);
            color: var(--text-dark);
            transition: var(--transition);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        .form-control.is-invalid {
            border-color: var(--danger);
        }
        .invalid-feedback {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        .form-actions {
            grid-column: span 2;
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
            margin-top: 1rem;
        }
         td.buttons {
           min-width: 120px; 
           white-space: nowrap;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }
        .btn-primary:hover {
            background-color: var(--primary-light);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        .btn-secondary {
            background-color: var(--secondary);
            color: var(--white);
        }
        .hidden {
            display: none;
        }
        .menu-toggle {
            display: none;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 6px;
            padding: 0.5rem 1rem;
            cursor: pointer;
            font-size: 1.2rem;
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1001;
        }
        .mobile-header {
            display: none;
            background: var(--white);
            padding: 1rem;
            box-shadow: 0 2px 10px var(--shadow);
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            z-index: 999;
            justify-content: space-between;
            align-items: center;
        }
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
        @media (max-width: 1200px) {
            .sidebar {
                width: 220px;
            }
            .main-content {
                margin-right: 220px;
                width: calc(100% - 220px);
            }
        }
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(100%);
                width: 260px;
                transition: transform 0.3s ease-in-out;
                margin-top: 0;
                box-shadow: 2px 0 10px var(--shadow);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-right: 0;
                width: 100%;
                padding-top: 4rem;
            }
            .menu-toggle {
                display: block;
            }
            .mobile-header {
                display: flex;
            }
            .overlay.active {
                display: block;
            }
            .product-form {
                grid-template-columns: 1fr;
            }
            .form-actions {
                grid-column: span 1;
            }
            .stats-cards {
                grid-template-columns: 1fr;
            }
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 0.5rem;
            }
            .content-section {
                padding: 1rem;
            }
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .filters {
                flex-direction: column;
            }
            .filter-select {
                width: 100%;
            }
            .user-avatar {
                width: 35px;
                height: 35px;
                font-size: 0.9rem;
            }
        }
        @media (max-width: 576px) {
            .page-title {
                font-size: 1.4rem;
            }
            .logo-text, .logo-icon {
                display: none;
            }
            .product-img {
                width: 40px;
                height: 40px;
            }
            .action-btn {
                padding: 0.4rem;
                margin-left: 0.25rem;
            }
            .pagination {
                flex-wrap: wrap;
                gap: 0.25rem;
            }
            .btn {
                padding: 0.6rem 1rem;
                font-size: 0.9rem;
            }
            .stat-card {
                padding: 1rem;
            }
            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            .stat-info h4 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay for mobile -->
    <div class="overlay" id="overlay"></div>

    <!-- Mobile Header -->
    <div class="mobile-header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-laptop"></i>
            </div>
            <div class="logo-text">Hamouda shop</div>
            </div>
        <div class="user-menu">
            <a href="{{ route('admin.logout') }}" class="user-avatar">خروج</a>
        </div>
    </div>

    <!-- Menu Toggle Button -->
    <button class="menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-laptop"></i>
            </div>
            <div class="logo-text">Hamouda shop</div>
        </div>
        <ul class="sidebar-menu">
 <li><a href="{{ route('order.index') }}" data-target="orders-section" class="active"><i class="fas fa-shopping-cart"></i> الطلبات</a></li>
            <li><a href="{{ route('product.showAdmin') }}" data-target="products-section"><i class="fas fa-box"></i> المنتجات</a></li>
            <li><a href="{{ route('admin.add') }}" data-target="add-product-section"><i class="fas fa-plus-circle"></i> إضافة منتج</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <div class="header">
            <div class="user-menu">
                <a href="{{ route('admin.logout') }}" class="user-avatar">خروج</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <div class="stats-cards">
            <div class="stat-card">
                <div class="stat-icon orders-icon"><i class="fas fa-shopping-cart"></i></div>
                <div class="stat-info">
                    <h4>{{ number_format($totalOrders, 0, '.', ',') }}</h4>
                    <p>إجمالي الطلبات</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon products-icon"><i class="fas fa-box"></i></div>
                <div class="stat-info">
                    <h4>{{ number_format($totalProducts, 0, '.', ',') }}</h4>
                    <p>المنتجات المتوفرة</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon revenue-icon"><i class="fas fa-dollar-sign"></i></div>
                <div class="stat-info">
                    <h4>{{ number_format($totalRevenue, 0, '.', ',') }} د.ج</h4>
                    <p>إجمالي الإيرادات</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon users-icon"><i class="fas fa-users"></i></div>
                <div class="stat-info">
                    <h4>{{ number_format($totalCustomers, 0, '.', ',') }}</h4>
                    <p>العملاء</p>
                </div>
            </div>
        </div>

        <div id="orders-section" class="content-section">
            <div class="section-header">
                <h2>إدارة الطلبات</h2>
            </div>
         
            <div class="search-box">
                <button><i class="fas fa-search"></i></button>
                <input type="text" placeholder="ابحث في الطلبات..." id="search-input">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th>السعر الإجمالي</th>
                        <th>العميل</th>
                        <th>الهاتف</th>
                        <th>الولاية</th>
                         <th>التوصيل</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
               @forelse ($orders as $order)


         @if($order->products->isEmpty())
        <tr>
            <td colspan="8" style="text-align:center;">الطلب بدون منتجات 😅</td>
        </tr>
    @else
  
    @foreach ($order->products as $product)
        <tr>
            <td>
                <div class="product-cell">
                    <div class="product-img">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div>{{ $product->name }}</div>
                </div>
            </td>
              <td>{{ $product->pivot->quantity }}</td>
             <td>{{ number_format($product->pivot->total_price, 0, '.', ',') }} د.ج</td>
             <td>{{ $order->name }}</td>
             <td>{{ $order->phone_number }}</td>
             <td>{{ $order->wilaya }}</td>
            <td>{{ App\Http\Controllers\OrderController::getDeliveryTypeArabic($order->delivery_type) }}</td>


             <td>
                <button class="status status-{{ $order->status }}" data-order-id="{{ $order->id }}">
                    @switch($order->status)
                        @case('pending') معلق @break
                        @case('shipped') تم الشحن @break
                        @case('cancelled') ملغى @break
                        @default غير معروف
                    @endswitch
                </button>
            </td>
            <td class="buttons">
                
                    <a href="{{ route('order.edit', $order->id) }}" class="action-btn edit-btn">
                    <i class="fas fa-edit"></i>
                    </a>
                
              
                  <a href="{{ route('order.delete', $order->id) }}" class="action-btn delete-btn" 
                   onclick="return confirm('هل أنت متأكد من حذف هذا الطلب؟')">
                    <i class="fas fa-trash"></i>
                </a>
              
            </td>
        </tr>
     @endforeach
    @endif
        @empty
    <tr>
        <td colspan="8" style="text-align: center;">لا توجد طلبات متاحة حاليًا</td>
    </tr>
@endforelse
                </tbody>
            </table>



      <div class="pagination">
    @if ($orders->onFirstPage())
        <button disabled>&laquo;</button>
    @else
        <a href="{{ $orders->previousPageUrl() }}"><button>&laquo;</button></a>
    @endif

    @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
        <a href="{{ $url }}">
            <button class="{{ $page == $orders->currentPage() ? 'active' : '' }}">{{ $page }}</button>
        </a>
    @endforeach

    @if ($orders->hasMorePages())
        <a href="{{ $orders->nextPageUrl() }}"><button>&raquo;</button></a>
    @else
        <button disabled>&raquo;</button>
    @endif
</div>


       
    </main>


   <script>
// Menu toggle functionality
const menuToggle = document.getElementById('menuToggle');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('overlay');

function toggleSidebar() {
    sidebar.classList.toggle('active');
    overlay.classList.toggle('active');
    
    // Change icon based on sidebar state
    const icon = menuToggle.querySelector('i');
    if (sidebar.classList.contains('active')) {
        icon.classList.remove('fa-bars');
        icon.classList.add('fa-times');
    } else {
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
}

menuToggle.addEventListener('click', toggleSidebar);

// Close sidebar when clicking on overlay
overlay.addEventListener('click', toggleSidebar);

// Close sidebar when clicking outside of it on mobile
document.addEventListener('click', function(event) {
    if (window.innerWidth <= 992 && sidebar.classList.contains('active')) {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickInsideToggle = menuToggle.contains(event.target);
        
        if (!isClickInsideSidebar && !isClickInsideToggle) {
            toggleSidebar();
        }
    }
});

// Handle window resize
window.addEventListener('resize', function() {
    if (window.innerWidth > 992) {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        const icon = menuToggle.querySelector('i');
        icon.classList.remove('fa-times');
        icon.classList.add('fa-bars');
    }
});

// Navigation functionality
const navLinks = document.querySelectorAll('.sidebar-menu a');
const contentSections = document.querySelectorAll('.content-section');
const currentPath = window.location.pathname;

// Set active link based on current URL
navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPath) {
        link.classList.add('active');
    } else {
        link.classList.remove('active');
    }
});

// Handle navigation
navLinks.forEach(link => {
    link.addEventListener('click', function(e) {
        const target = this.getAttribute('data-target');
        const href = this.getAttribute('href');

        // If the link has a data-target and the section exists, handle client-side
        if (target && document.getElementById(target)) {
            e.preventDefault();
            navLinks.forEach(item => item.classList.remove('active'));
            this.classList.add('active');
            contentSections.forEach(section => section.classList.add('hidden'));
            document.getElementById(target).classList.remove('hidden');
            toggleSidebar(); // Close sidebar on mobile after navigation
        } else {
            // Allow default navigation to load the new page
            // Optionally, you can add a loading indicator here
            console.log('Navigating to:', href);
        }
    });
});

// Status button functionality
const statusButtons = document.querySelectorAll('.status');
const statusClasses = ['status-pending', 'status-shipped', 'status-cancelled'];
const statusTexts = ['معلق', 'تم الشحن', 'ملغى'];

statusButtons.forEach(button => {
    button.addEventListener('click', function() {
        let currentIndex = statusClasses.findIndex(cls => this.classList.contains(cls));
        if (currentIndex === -1) currentIndex = 0;
        statusClasses.forEach(cls => this.classList.remove(cls));
        const nextIndex = (currentIndex + 1) % statusClasses.length;
        this.classList.add(statusClasses[nextIndex]);
        this.textContent = statusTexts[nextIndex];

        const orderId = this.getAttribute('data-order-id');
        const statusMap = {
            'معلق': 'pending',
            'تم الشحن': 'shipped',
            'ملغى': 'cancelled'
        };

        // Send the English status value
        const newStatus = statusMap[statusTexts[nextIndex]];

        console.log('Sending status:', newStatus); // Debugging

        fetch('{{ url('/admin/orders/update-status') }}/' + orderId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ status: newStatus })
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                  console.log('تم تحديث الحالة بنجاح');
              } else {
                  alert('فشل تحديث الحالة: ' + data.message);
              }
          }).catch(error => {
              console.error('خطأ في تحديث الحالة:', error);
              alert('حدث خطأ أثناء تحديث الحالة');
          });
    });
});

// Filter products
const productSearch = document.getElementById('product-search');
if (productSearch) {
    function filterProducts() {
        const search = productSearch.value.toLowerCase();
        document.querySelectorAll('#products-section tbody tr').forEach(row => {
            const nameText = row.querySelector('td:nth-child(2)').textContent.toLowerCase().includes(search);
            row.style.display = nameText ? '' : 'none';
        });
    }
    productSearch.addEventListener('input', filterProducts);
}
</script>
</body>
</html>
