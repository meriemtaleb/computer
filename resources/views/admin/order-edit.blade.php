<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هامودا شوب - تعديل الطلب</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361EE;
            --primary-light: #4895EF;
            --secondary: #6C757D;
            --success: #4CC9F0;
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
            background-color: var(--primary);
            color: #FFFFFF;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid var(--primary);
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
            margin-bottom: 1.5rem;
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
        .content-section {
            background-color: var(--white);
            border-radius: var(--radius);
            box-shadow: 0 5px 15px var(--shadow);
            padding: 1.5rem;
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
        .product-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }
        .form-group {
            margin-bottom: 1rem;
            display: flex;
            flex-direction: column;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            min-height: 20px;
        }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--white);
            color: var(--text-dark);
            transition: var(--transition);
            box-sizing: border-box;
            min-height: 45px;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }
        .form-actions {
            grid-column: span 2;
            display: flex;
            justify-content: flex-start;
            gap: 1rem;
            margin-top: 1rem;
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
        img{
            width: 40rem;
            height: 25rem;
            object-fit: cover;
        }
        a{
            text-decoration: none;
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
            .logo-text {
                display: none;
            }
            .logo-icon {
                display: none;
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
            <div class="logo-text">هامودا شوب</div>
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
            <li><a href="{{ route('order.index') }}" class="active"><i class="fas fa-shopping-cart"></i> الطلبات</a></li>
            <li><a href="{{ route('product.showAdmin') }}"><i class="fas fa-box"></i> المنتجات</a></li>
            <li><a href="{{ route('admin.add') }}"><i class="fas fa-plus-circle"></i> إضافة منتج</a></li>
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

        <div class="content-section">
            <div class="section-header">
                <h2>تعديل الطلب</h2>
            </div>
            <form class="product-form" method="POST" action="{{ route('order.update', $order->id) }}">
                @csrf
                @method('POST')
                <div>
                    <div class="form-group">
                        <label for="name">الاسم الكامل *</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $order->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">رقم الهاتف *</label>
                        <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old('phone_number', $order->phone_number) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="wilaya">الولاية *</label>
<input type="text" id="wilaya" name="wilaya" class="form-control" value="{{ old('wilaya', $order->wilaya) }}" placeholder="أدخل الولاية" required>
                    </div>
                    <div class="form-group">
                        <label for="status">الحالة *</label>
                        <select id="status" name="status" class="form-control" required>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>معلق</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>قيد المعالجة</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>تم الشحن</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>تم التوصيل</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>ملغى</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">الكمية *</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity', $order->products->first()->pivot->quantity) }}" min="1" max="{{ $order->products->first()->stock + $order->products->first()->pivot->quantity }}" required>
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <div class="product-cell">
                            <div class="product-img">
                                <img src="{{ asset('storage/' . $order->products->first()->image) }}" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <a href="{{ route('order.index') }}" class="btn btn-secondary">إلغاء</a>
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
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
        overlay.addEventListener('click', toggleSidebar);

        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 992 && sidebar.classList.contains('active')) {
                const isClickInsideSidebar = sidebar.contains(event.target);
                const isClickInsideToggle = menuToggle.contains(event.target);
                if (!isClickInsideSidebar && !isClickInsideToggle) {
                    toggleSidebar();
                }
            }
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
                const icon = menuToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });
    </script>
</body>

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
</script>
</html>