@extends('frontend.layouts.app')
@section('title', 'Оформление заказа')
@section('body-attr') style="margin:0; padding:0;" @endsection

@push('styles')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<style>
:root {
    --bg-primary: #ffffff;
    --bg-secondary: #f5f5f5;
    --bg-card: #fafafa;
    --text-primary: #1a1a1a;
    --text-secondary: #737373;
    --border-color: #e5e5e5;
    --primary: #2a2a2a;
    --primary-light: #525252;
    --accent: #404040;
    --destructive: #262626;
    --success: #525252;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: radial-gradient(ellipse 80% 50% at 50% -20%, rgba(240, 240, 240, 1), transparent 100%), 
                linear-gradient(180deg, #ffffff 0%, #e5e5e5 100%);
    color: var(--text-primary);
    min-height: 100vh;
    position: relative;
    overflow-x: hidden;
}

.font-heading {
    font-family: 'Poppins', sans-serif;
}

/* Background Elements */
.wave-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 600px;
    z-index: 0;
    overflow: hidden;
    opacity: 0.15;
    pointer-events: none;
}

.wave-bg svg {
    width: 200%;
    animation: waveMove 12s linear infinite;
}

@keyframes waveMove {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

.orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(100px);
    z-index: 0;
    pointer-events: none;
    animation: pulse 4s ease-in-out infinite;
}

.orb-1 {
    top: 5rem;
    left: 2.5rem;
    width: 18rem;
    height: 18rem;
    background: rgba(100, 100, 100, 0.15);
}

.orb-2 {
    bottom: 5rem;
    right: 2.5rem;
    width: 24rem;
    height: 24rem;
    background: rgba(180, 180, 180, 0.1);
    animation-delay: 1s;
}

@keyframes pulse {
    0%, 100% { opacity: 0.5; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.1); }
}

/* Container */
.container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 1rem;
    position: relative;
    z-index: 1;
}

/* Breadcrumb */
.breadcrumb-nav {
    padding: 1.5rem 0;
}

.breadcrumb {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(250, 250, 250, 0.8);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(229, 229, 229, 0.8);
    border-radius: 1rem;
    padding: 0.75rem 1.5rem;
    font-size: 0.875rem;
    font-weight: 500;
}

.breadcrumb a {
    color: var(--text-secondary);
    text-decoration: none;
    transition: color 0.3s;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb a:hover {
    color: var(--primary);
}

.breadcrumb-current {
    font-weight: 600;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.breadcrumb-separator {
    color: var(--text-secondary);
}

/* Grid Layout */
.checkout-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 0;
}

@media (min-width: 1024px) {
    .checkout-grid {
        grid-template-columns: 1fr 1fr;
    }
}

/* Cards */
.premium-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(250, 250, 250, 0.9) 100%);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(229, 229, 229, 0.8);
    border-radius: 2rem;
    padding: 2rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 0 30px rgba(0, 0, 0, 0.05);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.premium-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(220, 220, 220, 0.05) 0%, transparent 50%, rgba(200, 200, 200, 0.05) 100%);
    opacity: 0;
    transition: opacity 0.5s;
}

.premium-card:hover {
    transform: scale(1.01);
    box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.2), 0 0 50px rgba(0, 0, 0, 0.08);
}

.premium-card:hover::before {
    opacity: 1;
}

/* Card Header */
.card-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.icon-wrapper {
    width: 3.5rem;
    height: 3.5rem;
    border-radius: 1rem;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 40px rgba(50, 50, 50, 0.25), 0 0 60px rgba(80, 80, 80, 0.15);
}

.icon-wrapper svg {
    width: 1.75rem;
    height: 1.75rem;
    color: white;
}

.card-title {
    font-size: 1.875rem;
    font-weight: 700;
    margin: 0;
}

.card-subtitle {
    font-size: 0.875rem;
    color: var(--text-secondary);
    margin: 0;
}

/* Alert Box */
.alert-box {
    background: rgba(230, 230, 230, 0.5);
    border: 1px solid rgba(200, 200, 200, 0.6);
    border-radius: 1rem;
    padding: 1.25rem;
    margin-bottom: 1.5rem;
    display: flex;
    gap: 0.75rem;
    position: relative;
    z-index: 1;
}

.alert-icon {
    flex-shrink: 0;
    color: var(--destructive);
}

.alert-content h4 {
    color: var(--destructive);
    font-weight: 600;
    margin: 0 0 0.25rem 0;
    font-size: 1rem;
}

.alert-content p {
    color: rgba(60, 60, 60, 0.9);
    font-size: 0.875rem;
    margin: 0;
}

/* Button */
.btn-checkout {
    width: 100%;
    height: 4rem;
    background: linear-gradient(135deg, #2a2a2a 0%, #404040 50%, #525252 100%);
    border: none;
    border-radius: 1rem;
    color: white;
    font-size: 1.125rem;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    box-shadow: 0 10px 40px rgba(42, 42, 42, 0.3), 0 0 20px rgba(64, 64, 64, 0.2);
    transition: all 0.3s;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.btn-checkout::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(100%);
    transition: transform 0.3s;
}

.btn-checkout:hover::before {
    transform: translateY(0);
}

.btn-checkout:hover {
    transform: scale(1.02);
}

.btn-checkout svg {
    width: 1.5rem;
    height: 1.5rem;
}

.btn-sparkles {
    animation: sparkle 2s ease-in-out infinite;
}

@keyframes sparkle {
    0%, 100% { opacity: 1; transform: rotate(0deg) scale(1); }
    50% { opacity: 0.5; transform: rotate(180deg) scale(0.8); }
}

/* Security Badge */
.security-badges {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    padding-top: 1rem;
    position: relative;
    z-index: 1;
}

.security-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    color: var(--text-secondary);
}

.security-badge svg {
    width: 1rem;
    height: 1rem;
    color: var(--primary);
}

.divider {
    width: 1px;
    height: 1rem;
    background: var(--border-color);
}

/* Cart Summary */
.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.cart-badge {
    padding: 0.5rem 1rem;
    border-radius: 9999px;
    background: rgba(50, 50, 50, 0.15);
    color: var(--primary);
    font-weight: 700;
    font-size: 0.875rem;
}

/* Course Item */
.course-item {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(250, 250, 250, 0.8) 100%);
    backdrop-filter: blur(20px);
    border-radius: 1rem;
    padding: 1.25rem;
    margin-bottom: 1rem;
    display: flex;
    gap: 1.25rem;
    transition: all 0.5s;
    position: relative;
    overflow: hidden;
    border: 1px solid rgba(229, 229, 229, 0.6);
}

.course-item::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(200, 200, 200, 0.08) 0%, transparent 50%, rgba(180, 180, 180, 0.08) 100%);
    opacity: 0;
    transition: opacity 0.5s;
}

.course-item:hover {
    transform: scale(1.02);
}

.course-item:hover::before {
    opacity: 1;
}

.course-image-wrapper {
    position: relative;
    width: 7rem;
    height: 7rem;
    flex-shrink: 0;
    border-radius: 0.75rem;
    overflow: hidden;
}

.course-image-wrapper::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(100, 100, 100, 0.15) 0%, rgba(150, 150, 150, 0.15) 100%);
    z-index: 1;
    transition: transform 0.5s;
}

.course-item:hover .course-image-wrapper::before {
    transform: scale(1.1);
}

.course-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}

.course-item:hover .course-image {
    transform: scale(1.1);
}

.course-rating {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background: var(--primary);
    color: #ffffff;
    padding: 0.25rem 0.5rem;
    border-radius: 0.5rem;
    font-size: 0.75rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    z-index: 2;
}

.course-rating svg {
    width: 0.75rem;
    height: 0.75rem;
}

.course-info {
    flex: 1;
    min-width: 0;
    position: relative;
    z-index: 1;
}

.course-title {
    font-size: 1.125rem;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    margin: 0 0 0.5rem 0;
    color: var(--text-primary);
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: all 0.3s;
}

.course-item:hover .course-title {
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.course-instructor {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-secondary);
    font-size: 0.875rem;
    margin-bottom: 0.75rem;
}

.instructor-avatar {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background: rgba(100, 100, 100, 0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.75rem;
    font-weight: 700;
    color: var(--primary);
    overflow: hidden;
}

.instructor-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.course-price {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.price-current {
    font-size: 1.5rem;
    font-weight: 700;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.price-old {
    font-size: 0.875rem;
    color: var(--text-secondary);
    text-decoration: line-through;
}

/* Summary Box */
.summary-box {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.9) 0%, rgba(250, 250, 250, 0.8) 100%);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(229, 229, 229, 0.8);
    border-radius: 1rem;
    overflow: hidden;
    margin-top: 2rem;
    position: relative;
    z-index: 1;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.25rem;
    backdrop-filter: blur(10px);
}

.summary-row:not(:last-child) {
    border-bottom: 1px solid rgba(229, 229, 229, 0.6);
}

.summary-label {
    color: var(--text-secondary);
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.discount-badge {
    padding: 0.25rem 0.5rem;
    border-radius: 0.5rem;
    background: rgba(100, 100, 100, 0.15);
    color: var(--accent);
    font-size: 0.75rem;
    font-weight: 700;
}

.summary-value {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 1.25rem;
}

.summary-total {
    background: linear-gradient(135deg, #2a2a2a 0%, #404040 50%, #525252 100%);
    padding: 1.5rem;
    box-shadow: inset 0 0 30px rgba(255, 255, 255, 0.08);
}

.summary-total .summary-label,
.summary-total .summary-value {
    color: white;
}

.summary-total .summary-value {
    font-size: 1.875rem;
}

.lifetime-access {
    margin-top: 1.5rem;
    padding: 1rem;
    border-radius: 1rem;
    background: rgba(100, 100, 100, 0.08);
    border: 1px solid rgba(100, 100, 100, 0.15);
    text-align: center;
    position: relative;
    z-index: 1;
}

.lifetime-access p {
    font-size: 0.875rem;
    color: rgba(60, 60, 60, 0.9);
    margin: 0;
}

.lifetime-access strong {
    color: var(--primary);
    font-weight: 700;
}

/* Login Form */
.login-container {
    max-width: 36rem;
    margin: 0 auto;
    animation: fadeInUp 0.6s ease-out;
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

.login-card {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(250, 250, 250, 0.9) 100%);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(229, 229, 229, 0.8);
    border-radius: 2rem;
    padding: 3rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15), 0 0 30px rgba(0, 0, 0, 0.05);
    position: relative;
    overflow: hidden;
}

.login-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(220, 220, 220, 0.08) 0%, transparent 50%, rgba(200, 200, 200, 0.08) 100%);
}

.login-header {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}

.login-icon {
    width: 5rem;
    height: 5rem;
    margin: 0 auto 1.5rem;
    border-radius: 1.5rem;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 0 40px rgba(50, 50, 50, 0.25), 0 0 60px rgba(80, 80, 80, 0.15);
}

.login-icon svg {
    width: 2.5rem;
    height: 2.5rem;
    color: white;
}

.login-title {
    font-size: 2.25rem;
    font-weight: 900;
    font-family: 'Poppins', sans-serif;
    margin: 0 0 0.75rem 0;
    background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.login-subtitle {
    color: var(--text-secondary);
    font-size: 1.125rem;
    margin: 0;
}

.form-group {
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
}

.form-label {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.875rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--text-primary);
}

.form-label svg {
    width: 1rem;
    height: 1rem;
    color: var(--primary);
}

.form-input {
    width: 100%;
    height: 3.5rem;
    background: rgba(250, 250, 250, 0.8);
    border: 1px solid rgba(229, 229, 229, 0.8);
    border-radius: 0.75rem;
    padding: 0 1rem;
    color: var(--text-primary);
    font-size: 1rem;
    backdrop-filter: blur(10px);
    transition: all 0.3s;
}

.form-input:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(42, 42, 42, 0.1);
}

.form-input::placeholder {
    color: var(--text-secondary);
}

.password-wrapper {
    position: relative;
}

.password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: var(--text-secondary);
    cursor: pointer;
    transition: color 0.3s;
    padding: 0.5rem;
}

.password-toggle:hover {
    color: var(--primary);
}

.password-toggle svg {
    width: 1.25rem;
    height: 1.25rem;
}

.form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 0.5rem;
}

.forgot-link {
    color: var(--primary);
    text-decoration: none;
    font-size: 0.875rem;
    font-weight: 500;
    transition: color 0.3s;
}

.forgot-link:hover {
    color: var(--accent);
}

.login-footer {
    margin-top: 2rem;
    text-align: center;
    position: relative;
    z-index: 1;
}

.login-footer p {
    color: var(--text-secondary);
    margin: 0;
}

.signup-link {
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    transition: color 0.3s;
}

.signup-link:hover {
    color: var(--accent);
}

/* Animations */
.fade-in-left {
    animation: fadeInLeft 0.6s ease-out;
}

.fade-in-right {
    animation: fadeInRight 0.6s ease-out;
}

@keyframes fadeInLeft {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.sticky-cart {
    position: sticky;
    top: 1.25rem;
}

/* Responsive */
@media (max-width: 768px) {
    .course-item {
        flex-direction: column;
    }
    
    .course-image-wrapper {
        width: 100%;
        height: 12rem;
    }
    
    .premium-card {
        padding: 1.5rem;
    }
    
    .login-card {
        padding: 2rem;
    }
}

/* SVG Icons */
.icon-credit-card { width: 24px; height: 24px; }
.icon-sparkles { width: 20px; height: 20px; }
.icon-shield { width: 28px; height: 28px; }
.icon-lock { width: 20px; height: 20px; }
.icon-star { width: 12px; height: 12px; }
.icon-mail { width: 16px; height: 16px; }
.icon-eye { width: 20px; height: 20px; }
.icon-chevron { width: 16px; height: 16px; }
</style>
@endpush

@section('content')
<!-- Background Elements -->
<div class="wave-bg">
    <svg viewBox="0 0 1440 600" preserveAspectRatio="none">
        <defs>
            <linearGradient id="wave-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                <stop offset="0%" stop-color="#6b6b6b" stop-opacity="0.2" />
                <stop offset="50%" stop-color="#8a8a8a" stop-opacity="0.3" />
                <stop offset="100%" stop-color="#a3a3a3" stop-opacity="0.2" />
            </linearGradient>
        </defs>
        <path fill="url(#wave-gradient)" d="M0,192L48,197.3C96,203,192,213,288,213.3C384,213,480,203,576,192C672,181,768,171,864,186.7C960,203,1056,245,1152,234.7C1248,224,1344,160,1392,128L1440,96L1440,600L1392,600C1344,600,1248,600,1152,600C1056,600,960,600,864,600C768,600,672,600,576,600C480,600,384,600,288,600C192,600,96,600,48,600L0,600Z" />
    </svg>
</div>
<div class="orb orb-1"></div>
<div class="orb orb-2"></div>

<div class="container">
    <!-- Breadcrumb -->
    <div class="breadcrumb-nav">
        <div class="breadcrumb">
            <a href="/">
                <svg class="icon-sparkles" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.5L12 3l9 6.5V21a1 1 0 01-1 1h-6v-6h-4v6H4a1 1 0 01-1-1V9.5z" />
                </svg>
                Главная страница
            </a>
            <span class="breadcrumb-separator">
                <svg class="icon-chevron" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
            <span class="breadcrumb-current">Оформление заказа</span>
        </div>
    </div>

    @if(session()->has('studentLogin'))
        <!-- Checkout View -->
        <div class="checkout-grid">
            <!-- Checkout Form -->
            <div class="fade-in-left">
                <div class="premium-card">
                    <div class="card-header">
                        <div class="icon-wrapper">
                            <svg class="icon-shield" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="card-title font-heading">Оформление заказа</h2>
                            <p class="card-subtitle">Безопасная оплата</p>
                        </div>
                    </div>

                    <form action="{{ route('payment.ssl.submit') }}" method="POST">
                        @csrf
                        <div class="alert-box">
                            <div class="alert-icon">
                                <svg class="icon-lock" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <div class="alert-content">
                                <h4>Важно!</h4>
                                <p>Пожалуйста, проверьте свои курсы перед оплатой. Все транзакции защищены.</p>
                            </div>
                        </div>

                        <button type="submit" class="btn-checkout">
                            <svg class="icon-credit-card" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Подтвердить оплату
                            <svg class="icon-sparkles btn-sparkles" width="24px" height="24px" viewBox="0 0 24 24" stroke-width="2.1" fill="none" xmlns="http://www.w3.org/2000/svg" color="#fff">
                                <path d="M21.1679 8C19.6248 4.46819 16.1006 2 12 2C6.81465 2 2.5511 5.94668 2.04938 11" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M18 8H21.4C21.7314 8 22 7.73137 22 7.4V4" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M2.88146 16C4.42458 19.5318 7.94874 22 12.0494 22C17.2347 22 21.4983 18.0533 22 13" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6.04932 16H2.64932C2.31795 16 2.04932 16.2686 2.04932 16.6V20" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M14.5 15C14.7761 15 15 14.7761 15 14.5C15 14.2239 14.7761 14 14.5 14C14.2239 14 14 14.2239 14 14.5C14 14.7761 14.2239 15 14.5 15Z" fill="#fff" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9.5 10C9.77614 10 10 9.77614 10 9.5C10 9.22386 9.77614 9 9.5 9C9.22386 9 9 9.22386 9 9.5C9 9.77614 9.22386 10 9.5 10Z" fill="#fff" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15 9L9 15" stroke="#fff" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>

                        <div class="security-badges">
                            <div class="security-badge">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                SSL Защита
                            </div>
                            <div class="divider"></div>
                            <div class="security-badge">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                256-bit шифрование
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="fade-in-right">
                <div class="premium-card sticky-cart">
                    <div class="cart-header">
                        <h2 class="card-title font-heading">Ваши курсы</h2>
                        <div class="cart-badge">
                            @if(session('cart'))
                                {{ count(session('cart')) }} 
                            @else
                                0 курсов
                            @endif
                        </div>
                    </div>

                    <!-- Course List -->
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <div class="course-item">
                                <div class="course-image-wrapper">
                                    <img src="{{ asset('uploads/courses/' . $details['image']) }}" alt="{{ $details['title_en'] }}" class="course-image">
                                    <div class="course-rating">
                                        <svg class="icon-star" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                        5
                                    </div>
                                </div>
                                <div class="course-info">
                                    <h6 class="course-title">{{ $details['title_en'] }}</h6>
                                    <div class="course-instructor">
                                        <div class="instructor-avatar">
                                            @if(!empty($details['image']))
                                                <img src="{{ asset('uploads/instructors/' . $details['image']) }}" alt="{{ $details['instructor'] }}">
                                            @else
                                                @php
                                                    $names = explode(' ', $details['instructor'] ?? '');
                                                    $initials = (!empty($names[0]) ? substr($names[0], 0, 1) : '') 
                                                              . (!empty($names[1]) ? substr($names[1], 0, 1) : '');
                                                @endphp
                                                <span>{{ $initials }}</span>
                                            @endif
                                        </div>
                                        {{ $details['instructor'] }}
                                    </div>
                                    <div class="course-price">
                                        <span class="price-current">₸{{ number_format($details['price'], 2) }}</span>
                                        @if(!empty($details['old_price']))
                                            <span class="price-old">₸{{ number_format($details['old_price'], 2) }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <!-- Summary -->
                    <div class="summary-box">
                        <div class="summary-row">
                            <span class="summary-label">Промежуточный итог</span>
                            <span class="summary-value">₸{{ number_format((float) session('cart_details')['cart_total'] ?? 0) }}</span>
                        </div>
                        <div class="summary-row">
                            <span class="summary-label">
                                Скидка
                                <span class="discount-badge">-{{ session('cart_details')['discount'] ?? 0 }}%</span>
                            </span>
                            <span class="summary-value" style="color: var(--accent);">-₸{{ number_format((float)(session('cart_details')['discount_amount'] ?? 0)) }}</span>
                        </div>
                        <div class="summary-row summary-total">
                            <span class="summary-label">Итоговая сумма</span>
                            <span class="summary-value">₸{{ number_format((float)session('cart_details')['total_amount'] ?? 0) }}</span>
                        </div>
                    </div>

                    <div class="lifetime-access">
                        <p>💎 Получите <strong>пожизненный доступ</strong> ко всем курсам</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Login View -->
        <div class="login-container">
            <div class="login-card">
                <div class="login-header">
                    <div class="login-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <h2 class="login-title">Добро пожаловать</h2>
                    <p class="login-subtitle">Войдите для продолжения оформления заказа</p>
                </div>

                <form action="{{ route('studentLogin.check','checkout') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">
                            <svg class="icon-mail" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Email адрес
                        </label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="your@email.com" required>
                        @if($errors->has('email'))
                            <small style="color: var(--destructive); font-size: 0.875rem; display: block; margin-top: 0.5rem;">{{ $errors->first('email') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-footer">
                            <label for="password" class="form-label">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Пароль
                            </label>
                            <a href="{{ route('password.request') }}" class="forgot-link">Забыли пароль?</a>
                        </div>
                        <div class="password-wrapper">
                            <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
                            <button type="button" class="password-toggle" onclick="togglePassword()">
                                <svg id="eye-icon" class="icon-eye" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                        @if($errors->has('password'))
                            <small style="color: var(--destructive); font-size: 0.875rem; display: block; margin-top: 0.5rem;">{{ $errors->first('password') }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn-checkout" style="margin-top: 2rem;">
                        Войти в аккаунт
                    </button>
                </form>

                <div class="login-footer">
                    <p>
                        Нет аккаунта? 
                        <a href="{{ route('student.register') }}" class="signup-link">Зарегистрироваться</a>
                    </p>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

@push('scripts')
<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eye-icon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
    } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
    }
}
</script>
@endpush
