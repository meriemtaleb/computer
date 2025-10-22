<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر حمودة - متجر حواسيب</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
         :root {
            --dark: #212529;
            --light: #FFFFFF;
            --accent: #0077b6;
            --gray: #adb5bd;
            --darkblue: #03045e;
            --pink: #e4405f;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Tajawal', sans-serif;
            scroll-behavior: smooth;
        }
        body {
            background-color: #f8f9fa;
            color: var(--dark);
            min-width: 320px;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        header {
            background-color: var(--light);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            margin-left: 12px;
            width: 100% ;
            
        }
        .logo img {
            width: 200px;
            height: 40px;
        }
        nav {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        nav ul {
            display: flex;
            list-style: none;
            margin-left: -100px;
            
        }
        nav ul li {
            margin: 0 1rem;
            gap: 6px;
        }
        nav ul li a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 700;
            transition: color 0.3s;
            padding: 0.5rem;
            position: relative;
        }
        nav ul li a::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0%;
            height: 2px;
            background-color: var(--accent);
            transition: width 0.9s ease;
        }
        nav ul li a:hover::before {
            width: 100%;
        }
        .nav-icons {
            display: flex;
            align-items: center;
        }
        .nav-icon {
            position: relative;
            margin-left: 1.5rem;
            color: var(--dark);
            font-size: 1.2rem;
            transition: color 0.3s;
            cursor: pointer;
        }
         .nav-icons a{
            text-decoration: none;
            color: black;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: bold;
        }
        .menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 101;
        }
        .menu-toggle span {
            width: 25px;
            height: 3px;
            background-color: var(--dark);
            margin: 2px 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
      
        .login-section {
            padding: 4rem 0;
            min-height: calc(100vh - 200px);
            display: flex;
            align-items: center;
            background-color: var(--light);
        }
        .login-container {
            background-color: var(--light);
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.2);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            animation: slideIn 1.5s ease-in-out;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header h2 {
            font-size: 2.2rem;
            color: var(--dark);
            font-weight: 700;
            animation: subtlePulse 3s infinite ease-in-out;
        }
        .login-header p {
            color: var(--gray);
            font-size: 1.1rem;
            animation: fadeInText 2s ease-in-out;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }
        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid var(--gray);
            border-radius: 5px;
            font-size: 1rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: var(--accent);
            outline: none;
            box-shadow: 0 0 5px rgba(0,119,182,0.5);
        }
        .login-btn {
            width: 100%;
            padding: 1rem;
            background-color: var(--accent);
            color: var(--light);
            border: none;
            border-radius: 30px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .login-btn:hover {
            background-color: #184e77;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }
        .error-message {
            color: var(--pink);
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1rem;
            display: none;
        }
        footer {
            background-color: var(--dark);
            color: var(--light);
            padding: 3rem 0 1rem;
        }
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        .footer-column h3 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }
        .footer-column ul {
            list-style: none;
        }
        .footer-column ul li {
            margin-bottom: 0.8rem;
        }
        .footer-column ul li a {
            color: var(--light);
            text-decoration: none;
            transition: color 0.3s;
        }
        .footer-column ul li a:hover {
            color: var(--gray);
        }
        .social-links {
            display: flex;
            margin-top: 1rem;
        }
        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            color: var(--light);
            border-radius: 50%;
            margin-right: 0.5rem;
            transition: all 0.3s;
        }
        .facebook a:hover {
            background-color: var(--accent);
            transform: translateY(-5px);
        }
        .insta a:hover {
            background-color: var(--pink);
            transform: translateY(-5px);
        }
        .copyright {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 2rem;
        }
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .header-content {
                flex-wrap: wrap;
            }
            .menu-toggle {
                display: flex;
                order: 1;
            }
            .logo {
                display: none;
            }
            .nav-icons {
                order: 3;
            }
            nav {
                order: 4;
                flex-basis: 100%;
                margin-top: 1rem;
            }
            nav.active {
                display: flex;
                animation: fadeIn 0.5s ease;
            }
            nav:not(.active) {
                display: none;
            }
            nav ul {
                flex-direction: column;
                width: 100%;
            }
            nav ul li {
                margin: 0.5rem 0;
                text-align: center;
            }
        }
        @media (max-width: 576px) {
            .container {
                width: 95%;
                padding: 1.5rem 0;
            }
            .login-header h2 {
                font-size: 1.6rem;
            }
        }
        @media (max-width: 480px) {
            .login-header h2 {
                font-size: 1.4rem;
            }
        }
        @media (max-width: 360px) {
            .container {
                padding: 1rem 0;
            }
            .login-container {
                padding: 1rem;
            }
        }
   
    </style>
</head>
<body>
    <header>
        <div class="container header-content">
            <div class="menu-toggle" id="mobile-menu">
            <span></span>
            <span></span>
            <span></span>

            </div>




           <div class="nav-icons">
                 <div class="nav-icon">
                 <a href="{{ route('cart.show') }}"><i class="fas fa-shopping-cart"></i></a>
                    <span class="cart-count">{{ $cartCount ?? 0 }}</span>
                </div>
                <div class="nav-icon">
                    <a href="{{ route('showLoginForm') }}"> <i class="fas fa-user"></i></a>
                </div>
            </div>
          
            <nav id="main-nav">
                <ul>
                    <li><a class="elemnts" href="{{ route('product.showindex') }}">الرئيسية</a></li>
                    <li><a class="elemnts" href="{{ route('product.showmainpage') }}">المنتجات</a></li>
                    <li><a class="elemnts" href="#footer">الخدمات</a></li>
                    <li><a class="elemnts" href="#footer">اتصل بنا</a></li>
                </ul>
            </nav>
            
            <div class="logo">
                <img src="{{asset('images/hamouda-removebg-preview.png')  }}" alt="متجر حمودة">
            </div>
        </div>
    </header>
    <section class="login-section">
        <div class="container">
            <div class="login-container">
                <div class="login-header">
                    <h2>تسجيل دخول  </h2>
                    <p>تسجيل الدخل مخصص فقط لصاحب الموقع</p>
                </div>
                <form id="login-form" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">البريد الإلكتروني</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="أدخل بريدك الإلكتروني" required>
                    </div>
                    <div class="form-group">
                        <label for="password">كلمة المرور</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="أدخل كلمة المرور" required>
                    </div>
                    @if (session('error'))
                        <p class="error-message" style="display: block;">{{ session('error') }}</p>
                    @else
                        <p class="error-message" id="error-message">بريد إلكتروني أو كلمة مرور غير صحيحة</p>
                    @endif
                    <button type="submit" class="login-btn">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>متجر حمودة</h3>
                    <p>متجر متخصص في الحواسيب والخدمات الفنية في الجزائر</p>
                    <div class="social-links">
                        <div class="facebook">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </div>
                        <div class="insta">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>روابط سريعة</h3>
                    <ul>
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">المنتجات</a></li>
                        <li><a href="#">الخدمات</a></li>
                        <li><a href="#">حول</a></li>
                        <li><a href="#">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>خدماتنا</h3>
                    <ul>
                        <li><a href="#">حواسيب</a></li>
                        <li><a href="#">التسوق العالمي</a></li>
                        <li><a href="#">تسجيل الدورات</a></li>
                        <li><a href="#">تحويل أموال دولي</a></li>
                        <li><a href="#">دعم فني</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>اتصل بنا</h3>
                    <ul>
                        <li><i class="fas fa-phone"></i> 0552155123</li>
                        <li><i class="fas fa-envelope"></i> contact@hamoudashop.dz</li>
                        <li><i class="fas fa-map-marker-alt"></i> الجزائر</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script>
        // Mobile menu toggle functionality
        const mobileMenu = document.getElementById('mobile-menu');
        const mainNav = document.getElementById('main-nav');

        mobileMenu.addEventListener('click', function() {
            this.classList.toggle('active');
            if (this.classList.contains('active')) {
                mainNav.classList.remove('active');
            } else {
                mainNav.classList.add('active');
            }
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const isClickInsideNav = mainNav.contains(event.target);
            const isClickInsideToggle = mobileMenu.contains(event.target);
            if (!isClickInsideNav && !isClickInsideToggle && mainNav.classList.contains('active')) {
                mobileMenu.classList.remove('active');
                mainNav.classList.remove('active');
            }
        });
    </script>
</body>
</html>