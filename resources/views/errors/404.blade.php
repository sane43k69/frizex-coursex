<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Страница не найдена | CourseX</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <style>
        :root {
            --primary-black: #000000;
            --secondary-black: #1a1a1a;
            --light-gray: #f5f5f5;
            --medium-gray: #6b7280;
            --border-gray: #e5e7eb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 50%, #f3f4f6 100%);
            overflow-x: hidden;
            position: relative;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Animated Grid Background */
        .grid-background {
            position: fixed;
            inset: 0;
            background-image: 
                linear-gradient(rgba(0, 0, 0, 0.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.02) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
            pointer-events: none;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        /* Particles Background */
        .particles {
            position: fixed;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.05));
            border-radius: 50%;
            animation: particleFloat 15s infinite;
        }

        .particle:nth-child(1) { left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { left: 20%; animation-delay: 2s; }
        .particle:nth-child(3) { left: 30%; animation-delay: 4s; }
        .particle:nth-child(4) { left: 40%; animation-delay: 1s; }
        .particle:nth-child(5) { left: 50%; animation-delay: 3s; }
        .particle:nth-child(6) { left: 60%; animation-delay: 5s; }
        .particle:nth-child(7) { left: 70%; animation-delay: 2.5s; }
        .particle:nth-child(8) { left: 80%; animation-delay: 4.5s; }
        .particle:nth-child(9) { left: 90%; animation-delay: 1.5s; }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        /* Gradient Orbs */
        .gradient-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.08;
            pointer-events: none;
            z-index: 0;
        }

        .orb-1 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, #000000 0%, transparent 70%);
            top: -200px;
            left: -200px;
            animation: orbFloat1 20s ease-in-out infinite;
        }

        .orb-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, #1a1a1a 0%, transparent 70%);
            bottom: -150px;
            right: -150px;
            animation: orbFloat2 18s ease-in-out infinite;
        }

        .orb-3 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #4b5563 0%, transparent 70%);
            top: 50%;
            left: 50%;
            animation: orbFloat3 22s ease-in-out infinite;
        }

        @keyframes orbFloat1 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(100px, 50px) scale(1.1); }
            66% { transform: translate(-50px, 100px) scale(0.9); }
        }

        @keyframes orbFloat2 {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(-80px, -60px) scale(1.15); }
            66% { transform: translate(60px, -80px) scale(0.95); }
        }

        @keyframes orbFloat3 {
            0%, 100% { transform: translate(-50%, -50%) scale(1); }
            50% { transform: translate(-50%, -50%) scale(1.2); }
        }

        /* Main Container */
        .container {
            position: relative;
            z-index: 10;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 2rem;
        }

        /* Navigation */
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 4rem;
            animation: slideDown 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            font-size: 2rem;
            font-weight: 900;
            color: var(--primary-black);
            letter-spacing: -1.5px;
            position: relative;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .logo::after {
            content: 'X';
            color: #6b7280;
            margin-left: -4px;
        }

        .logo:hover {
            letter-spacing: 0px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(0, 0, 0, 0.06);
            border-radius: 100px;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--medium-gray);
            backdrop-filter: blur(10px);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.2); }
        }

        /* Main Content */
        .main-content {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        .content-left {
            animation: fadeInLeft 1s cubic-bezier(0.16, 1, 0.3, 1) 0.2s both;
        }

        @keyframes fadeInLeft {
            0% {
                opacity: 0;
                transform: translateX(-40px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .error-label {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.02));
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 8px;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--medium-gray);
            margin-bottom: 2rem;
        }

        .error-code {
            font-size: 12rem;
            font-weight: 900;
            line-height: 0.9;
            letter-spacing: -12px;
            color: var(--primary-black);
            margin-bottom: 2rem;
            position: relative;
            display: inline-block;
            background: linear-gradient(135deg, #000000 0%, #374151 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .error-code::before {
            content: '404';
            position: absolute;
            top: 8px;
            left: 8px;
            background: linear-gradient(135deg, #d1d5db 0%, #e5e7eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            z-index: -1;
        }

        .error-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--secondary-black);
            line-height: 1.1;
            margin-bottom: 1.5rem;
            letter-spacing: -2px;
        }

        .error-description {
            font-size: 1.25rem;
            line-height: 1.7;
            color: var(--medium-gray);
            margin-bottom: 3rem;
            max-width: 500px;
            font-weight: 400;
        }

        /* CTA Section */
        .cta-section {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1.25rem 2.5rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #000000 0%, #1a1a1a 100%);
            border: none;
            border-radius: 12px;
            text-decoration: none;
            box-shadow: 
                0 1px 2px rgba(0, 0, 0, 0.05),
                0 20px 40px rgba(0, 0, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .primary-button::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .primary-button:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 1px 2px rgba(0, 0, 0, 0.05),
                0 30px 60px rgba(0, 0, 0, 0.25);
        }

        .primary-button:hover::before {
            opacity: 1;
        }

        .primary-button:active {
            transform: translateY(0);
        }

        .button-icon {
            width: 20px;
            height: 20px;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .primary-button:hover .button-icon {
            transform: translateX(-4px);
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1.25rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary-black);
            background: transparent;
            border: 2px solid rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .secondary-button:hover {
            background: rgba(0, 0, 0, 0.03);
            border-color: rgba(0, 0, 0, 0.2);
        }

        /* Illustration Section */
        .illustration-section {
            position: relative;
            animation: fadeInRight 1s cubic-bezier(0.16, 1, 0.3, 1) 0.4s both;
        }

        @keyframes fadeInRight {
            0% {
                opacity: 0;
                transform: translateX(40px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .illustration-wrapper {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
            box-shadow: 
                0 0 0 1px rgba(0, 0, 0, 0.05),
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 40px 80px rgba(0, 0, 0, 0.06);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .illustration-wrapper:hover {
            transform: translateY(-8px) scale(1.01);
            box-shadow: 
                0 0 0 1px rgba(0, 0, 0, 0.05),
                0 30px 60px rgba(0, 0, 0, 0.12),
                0 60px 120px rgba(0, 0, 0, 0.08);
        }

        .illustration {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .illustration-wrapper:hover .illustration {
            transform: scale(1.02);
        }

        /* Glass Card */
        .glass-card {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            right: 2rem;
            padding: 1.5rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) 0.8s both;
        }

        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-card-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--primary-black);
            margin-bottom: 0.5rem;
        }

        .glass-card-text {
            font-size: 0.75rem;
            color: var(--medium-gray);
            line-height: 1.5;
        }

        /* Stats */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.02);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            background: rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-black);
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--medium-gray);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .main-content {
                grid-template-columns: 1fr;
                gap: 4rem;
            }

            .error-code {
                font-size: 9rem;
            }

            .error-title {
                font-size: 2.5rem;
            }

            .stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 640px) {
            .container {
                padding: 1.5rem;
            }

            .nav {
                margin-bottom: 3rem;
            }

            .logo {
                font-size: 1.5rem;
            }

            .status-badge {
                font-size: 0.75rem;
                padding: 0.375rem 0.75rem;
            }

            .error-code {
                font-size: 6rem;
                letter-spacing: -6px;
            }

            .error-title {
                font-size: 2rem;
            }

            .error-description {
                font-size: 1rem;
            }

            .cta-section {
                flex-direction: column;
                width: 100%;
            }

            .primary-button,
            .secondary-button {
                width: 100%;
                justify-content: center;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }

            .glass-card {
                left: 1rem;
                right: 1rem;
                bottom: 1rem;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Backgrounds -->
    <div class="grid-background"></div>
    <div class="gradient-orb orb-1"></div>
    <div class="gradient-orb orb-2"></div>
    <div class="gradient-orb orb-3"></div>
    
    <div class="particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <div class="container">
        <!-- Navigation -->
        <nav class="nav">
            <div class="logo">Course</div>
            <div class="status-badge">
                <div class="status-dot"></div>
                <span>Все системы работают</span>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Left Content -->
            <div class="content-left">
                <div class="error-label">Ошибка 404</div>
                <h1 class="error-code">404</h1>
                <h2 class="error-title">Страница не найдена</h2>
                <p class="error-description">
                    Похоже, вы попали не туда. Страница, которую вы ищете, не существует, была удалена или временно недоступна.
                </p>

                <div class="cta-section">
                    <a href="{{ route('home') }}" class="primary-button">
                        <svg class="button-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Вернуться на главную</span>
                    </a>
                    
                    <a href="{{ route('contact') }}" class="secondary-button">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                        <span>Помощь</span>
                    </a>
                </div>

                <div class="stats">
                    <div class="stat-item">
                        <div class="stat-value">99.9%</div>
                        <div class="stat-label">Uptime</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">&lt;100ms</div>
                        <div class="stat-label">Отклик</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">24/7</div>
                        <div class="stat-label">Поддержка</div>
                    </div>
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="illustration-section">
                <div class="illustration-wrapper">
                    <img src="/images/404-premium.png" alt="404 Illustration" class="illustration" />
                    
                    <div class="glass-card">
                        <div class="glass-card-title">Не можете найти нужное?</div>
                        <div class="glass-card-text">
                            Свяжитесь с нашей службой поддержки, мы поможем вам найти то, что вы ищете.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
