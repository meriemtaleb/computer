<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Meriem!</title>
    <style>
        /* Full screen magical background */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to top, #ffe6f2, #fff0ff, #fef9ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
        }

        /* Floating welcome text */
        h1 {
            font-size: 3rem;
            background: linear-gradient(45deg, #ffb6c1, #ff69b4, #ff1493);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: floatBounce 3s ease-in-out infinite;
            text-align: center;
        }

        @keyframes floatBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-30px); }
        }

        /* Sparkles */
        .sparkle {
            position: absolute;
            width: 8px;
            height: 8px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 0 8px #fff;
            animation: sparkleMove 4s linear infinite;
        }

        @keyframes sparkleMove {
            0% { transform: translateY(0) translateX(0) scale(1); opacity: 1; }
            50% { transform: translateY(-400px) translateX(50px) scale(1.5); opacity: 0.5; }
            100% { transform: translateY(0) translateX(0) scale(1); opacity: 1; }
        }

        /* Cute floating clouds */
        .cloud {
            position: absolute;
            width: 100px;
            height: 60px;
            background: #ffe6f7;
            border-radius: 50%;
            opacity: 0.8;
            animation: cloudMove linear infinite;
        }

        .cloud::before,
        .cloud::after {
            content: '';
            position: absolute;
            background: #ffe6f7;
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .cloud::before {
            top: -20px;
            left: 10px;
        }

        .cloud::after {
            top: -10px;
            right: 10px;
        }

        @keyframes cloudMove {
            0% { transform: translateX(-200px); }
            100% { transform: translateX(120vw); }
        }
    </style>
</head>
<body>
    <h1>✨ Welcome Meriem! ✨</h1>

    <!-- Sparkles -->
    <div class="sparkle" style="left: 10%; top: 80%; animation-delay: 0s;"></div>
    <div class="sparkle" style="left: 50%; top: 90%; animation-delay: 1s;"></div>
    <div class="sparkle" style="left: 70%; top: 70%; animation-delay: 2s;"></div>
    <div class="sparkle" style="left: 30%; top: 60%; animation-delay: 3s;"></div>
    <div class="sparkle" style="left: 85%; top: 50%; animation-delay: 0.5s;"></div>

    <!-- Clouds -->
    <div class="cloud" style="top: 20%; animation-duration: 50s;"></div>
    <div class="cloud" style="top: 50%; animation-duration: 70s;"></div>
    <div class="cloud" style="top: 70%; animation-duration: 60s;"></div>
</body>
</html>
