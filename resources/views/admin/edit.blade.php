<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>هامودا شوب - تفاصيل المنتج</title>
    <!-- Bootstrap CSS -->

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
            background-color:var(--primary); 
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
        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .page-title i {
            color: var(--primary);
        }
        .user-menu {
            display: flex;
            justify-content: start;
            margin-right: auto;
           
        }
        .user-menu a{
             text-decoration: none;
        }
        .user-info {
            text-align: right;
        }
        .user-name {
            font-weight: 600;
            color: var(--text-dark);
        }
        .user-role {
            font-size: 0.85rem;
            color: var(--text-light);
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
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        select.form-control {
            width: 100%;
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
        .btn-danger {
            background-color: var(--danger);
            color: var(--white);
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
        .-upload {
            border: 2px dashed var(--border);

            /*padding: 1.5rem;*/
        
            text-align: center;
            margin-bottom: 1rem;
            cursor: pointer;

        }

        .-upload i {
            font-size: 2rem;
            color: var(--text-light);
            margin-bottom: 0.5rem;
           
        }
        .-upload img{
           
              background-color: none;
              width: 10rem;
              height: 10rem;


        }
        .upload-text {
            color: var(--text-light);
        }
        .uploaded-s {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }
        .-preview {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            height: 100px;
        }
    
        .remove- {
            position: absolute;
            top: 5px;
            left: 5px;
            background: var(--danger);
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 0.8rem;
        }
        .color-options {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
        }
        .color-option {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
        }
        .color-option.active::after {
            content: '✓';
            position: absolute;
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
            color: white;
            font-size: 0.8rem;
            font-weight: bold;
            text-shadow: 0 0 2px rgba(0,0,0,0.5);
        }
        .add-color {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--light-bg);
            color: var(--text-light);
            font-size: 1.2rem;
        }
        .specs-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .specs-grid .form-group {
            margin-bottom: 0;
            height: 100%;
        }
        .specs-grid .form-group label {
            min-height: 20px;
            margin-bottom: 0.5rem;
        }
        .specs-grid .form-control {
            flex-grow: 1;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea {
            width: 100% !important;
            max-width: 100%;
            box-sizing: border-box;
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
            .user-info {
                display: none;
            }
            .product-form {
                grid-template-columns: 1fr;
            }
            .form-actions {
                grid-column: span 1;
            }
            .specs-grid {
                grid-template-columns: 1fr;
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
            <div class="logo-text">Hamouda Shop</div>
        </div>
        <div class="user-menu">
            <div class="user-avatar">AD</div>
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
            <div class="logo-text">Hamouda Shop</div>
        </div>
        <ul class="sidebar-menu">
           
            <li><a href="admin-orders.html"><i class="fas fa-shopping-cart"></i> الطلبات</a></li>
            <li><a href="admin-products.html"><i class="fas fa-box"></i> المنتجات</a></li>
            <li><a href="admin-add.html" ><i class="fas fa-plus-circle"></i> إضافة منتج</a></li>
        </ul>
    </aside>

    
 <div class="main-content">
<div class="header">
    <div class="user-menu">
        <a href="{{ route('admin.logout') }}" class="user-avatar">
خروج  
        </a>
    </div>

</div>


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

         
         





@if(session('update'))
    <div class="alert alert-success">
        {{ session('update') }}
    </div>
@endif




        <div class="content-section">

              <form class="product-form" id="productForm" method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
     @csrf
    <!-- Basic Info Column -->
    <div>
        <div class="form-group">
            <label for="product-name">اسم المنتج *</label>
            <input name="name" type="text" id="product-name" class="form-control" placeholder="أدخل اسم المنتج" value="{{ old('name', $product->name) }}" required>
        </div>
        <div class="form-group">
            <label for="product-price">السعر *</label>
            <input name="price" type="number" id="product-price" class="form-control" placeholder="أدخل السعر" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="form-group">
            <label for="product-category">الفئة *</label>
            <input name="category" type="text" id="product-category" class="form-control" placeholder="ادخل النوع" value="{{ old('category', $product->category) }}" required>
        </div>
        <div class="form-group">
            <label for="product-stock">الكمية في المخزون *</label>
            <input name="stock" type="number" id="product-stock" class="form-control" placeholder="أدخل الكمية" value="{{ old('stock', $product->stock) }}" required>
        </div>
        <div class="form-group">
            <label for="product-status">الحالة</label>
            <input name="status" type="text" id="product-status" class="form-control" placeholder="أدخل الحالة" value="{{ old('status', $product->status) }}" required>
        </div>
    </div>
    <!-- Specifications Column -->
    <div>
        <div class="form-group">
            <div class="specs-grid">
                <div class="form-group">
                    <label for="spec-processor">المعالج</label>
                    <input name="cpu" type="text" id="spec-processor" class="form-control" placeholder="نوع المعالج" value="{{ old('cpu', $product->cpu) }}">
                </div>
                <div class="form-group">
                    <label for="spec-ram">الذاكرة العشوائية</label>
                    <input name="ram" type="text" id="spec-ram" class="form-control" placeholder="حجم ونوع الذاكرة" value="{{ old('ram', $product->ram) }}">
                </div>
                <div class="form-group">
                    <label for="spec-storage">التخزين</label>
                    <input name="storage" type="text" id="spec-storage" class="form-control" placeholder="سعة ونوع التخزين" value="{{ old('storage', $product->storage) }}">
                </div>
                <div class="form-group">
                    <label for="spec-graphics">بطاقة الرسومات</label>
                    <input name="gpu" type="text" id="spec-graphics" class="form-control" placeholder="نوع بطاقة الرسومات" value="{{ old('gpu', $product->gpu) }}">
                </div>
                <div class="form-group">
                    <label for="spec-display">الشاشة</label>
                    <input name="screen" type="text" id="spec-display" class="form-control" placeholder="مقاس ونوع الشاشة" value="{{ old('screen', $product->screen) }}">
                </div>
                <div class="form-group">
                    <label for="spec-keyboard">لوحة المفاتيح</label>
                    <input name="keybored" type="text" id="spec-keyboard" class="form-control" placeholder="نوع لوحة المفاتيح" value="{{ old('keybored', $product->keybored) }}">
                </div>
                <div class="form-group">
                    <label for="spec-charger">الشاحن</label>
                    <input name="charger" type="text" id="spec-charger" class="form-control" placeholder="نوع الشاحن" value="{{ old('charger', $product->charger) }}">
                </div>
                <div class="form-group">
                    <label for="spec-battery">البطارية</label>
                    <input name="battery" type="text" id="spec-battery" class="form-control" placeholder="سعة البطارية" value="{{ old('battery', $product->battery) }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>صورة المنتج</label>
            <div class="-upload" id="Upload">
                <img src="{{ asset('storage/' . $product->image) }}" width="150" alt="الصورة الحالية">
                <input name="image" type="file" accept="image/*" id="fileInput">
            </div>
        </div>
    </div>
    <div class="form-actions">
        <button type="reset" class="btn btn-secondary">إلغاء</button>
        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
    </div>
</form>
           
           
        </div>


      
    </div>

    <script>
        // Menu toggle functionality
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

const fileInput = document.getElementById('fileInput');
const previewImg = document.querySelector('#Upload img');
fileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // نبدل الصورة القديمة باللي اختارها المستخدم
            previewImg.src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
         



    </script>
</body>
</html>
