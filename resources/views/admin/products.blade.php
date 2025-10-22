<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamouda Shop - إدارة المنتجات</title>
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
            --danger: red;
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
        .sidebar {
            width: 245px;
            background: var(--white);
            box-shadow: 0 0 20px var(--shadow);
            padding: 1.5rem 1rem;
            transition: var(--transition);
            height: 100vh;
            position: fixed;
            z-index: 1000;
            overflow-y: auto;
            right: 0;
            top: 0;
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
            transition: var(--transition);
            width: calc(100% - 245px);
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
               max-width: 30000px;
          
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
        }
        th, td {
            padding: 1rem;
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
        .product-img {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            overflow: hidden;
        }
        .product-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .action-btn {
            padding: 0.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-left: 0.5rem;
            color: var(--white);
            transition: var(--transition);
        }
        a{
            text-decoration: none;
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
        
        /* Mobile Header */
        .mobile-header {
            background-color: pink;
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
        
        /* Overlay for mobile */
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
        
        /* Responsive Styles */
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
            table{
                display: block;
                overflow-x: auto;
               
            }
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 1rem 0.5rem;
            }
            .content-section {
                padding: 1rem;
            }
            th, td {
                padding: 0.75rem 0.5rem;
            }
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            .search-box {
                width: 100%;
            }
            .pagination button {
                padding: 0.5rem 0.75rem;
                margin: 0 0.1rem;
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
            .logo-icon{
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
            <li><a href="{{ route('order.index') }}" data-target="orders-section" class="active"><i class="fas fa-shopping-cart"></i> الطلبات</a></li>
            <li><a href="{{ route('product.showAdmin') }}" data-target="products-section"><i class="fas fa-box"></i> المنتجات</a></li>
            <li><a href="{{ route('admin.add') }}" data-target="add-product-section"><i class="fas fa-plus-circle"></i> إضافة منتج</a></li>
        </ul>
    </aside>
    
    <!-- Main Content -->
    <main class="main-content">
<div class="header">
    <div class="user-menu">
        <a href="{{ route('admin.logout') }}" class="user-avatar">
خروج  
        </a>
    </div>
</div>

    @if(session('delete'))
  <div class="alert alert-success">
    {{session('delete')  }}
     </div>
    @endif

        <div class="content-section">
            <div class="section-header">
                <h2>قائمة المنتجات</h2>
              
            </div>

            <div class="search-box">
                <button><i class="fas fa-search"></i></button>
                <input type="text" placeholder="ابحث في المنتجات...">
            </div>

            <table>
               
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>الفئة</th>
                        <th>السعر</th>
                        <th>المخزون</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($products as $product)
                    <tr>
                        <td>
                            <div class="product-img">
                                <img src="{{asset('storage/' .$product->image)}} " >
                            </div>
                        </td>
                        <td>{{$product->name}}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <!--<button class="action-btn edit-btn"><i class=""></i></button>
                                                <button class="action-btn delete-btn"></button>!-->
                            <a    class="action-btn delete-btn" href="/admin/products/delete/{{ $product->id }}" ><i class="fas fa-trash"></i>  </a>
                            <a    class="action-btn edit-btn" href="/admin/products/edit/{{ $product->id }}" >  <i class="fas fa-edit"></i></a>

                        </td>
                    </tr>
                       @endforeach
                </tbody>
             
            </table>

@if ($products->hasPages())
<div class="pagination">
    @if ($products->onFirstPage())
        <button disabled>&laquo;</button>
    @else
        <a href="{{ $products->previousPageUrl() }}"><button>&laquo;</button></a>
    @endif

    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <a href="{{ $url }}">
            <button class="{{ $page == $products->currentPage() ? 'active' : '' }}">{{ $page }}</button>
        </a>
    @endforeach

    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}"><button>&raquo;</button></a>
    @else
        <button disabled>&raquo;</button>
    @endif
</div>
@endif


    </main>

  
</body>
</html>