@extends('frontend.layouts.app')
@section('title', 'CourseX для бизнеса')
@section('header-attr') class="nav-shadow" @endsection

@section('content')

<!-- HERO СЕКЦИЯ -->
<section class="position-relative overflow-hidden bg-white" style="min-height: 90vh;">
    <!-- Фоновая SVG волна -->
    <svg class="position-absolute bottom-0 start-0 w-100" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg"
         style="z-index: 0; animation: waveMove 12s ease-in-out infinite alternate;">
        <path fill="rgba(13,110,253,0.05)" d="M0,160L48,144C96,128,192,96,288,112C384,128,480,192,576,213.3C672,235,768,213,864,208C960,203,1056,213,1152,208C1248,203,1344,181,1392,170.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"/>
    </svg>

    <!-- Световой акцент -->
    <div class="position-absolute top-0 end-0" 
         style="width: 300px; height: 300px; background: radial-gradient(circle, rgba(13,110,253,0.08), transparent 70%); filter: blur(80px);"></div>

    <!-- Контент -->
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative z-1"
         style="max-width: 850px; min-height: 90vh;">
        <div class="fade-in-up">
            <h1 class="display-4 fw-bold text-dark mb-4 lh-sm">
                CourseX для бизнеса
            </h1>
            <p class="lead text-secondary mb-0" style="max-width: 680px;">
                Развивайте потенциал вашей команды с помощью современной платформы корпоративного обучения.  
                Мы помогаем компаниям расти, внедрять знания и добиваться результатов вместе.
            </p>
        </div>
    </div>
</section>

<!-- СЕКЦИЯ ПРЕИМУЩЕСТВ -->
<section class="py-5 bg-light border-top border-bottom">
    <div class="container py-4">
        <div class="text-center mb-5 fade-in-up">
            <h2 class="fw-bold mb-3">Почему компании выбирают CourseX</h2>
            <p class="text-secondary">Инструменты и аналитика, которые действительно помогают развивать сотрудников.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-4 fade-in-up">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4 text-center">
                        <div class="display-6 mb-3">📊</div>
                        <h5 class="fw-semibold mb-2">Отчёты и аналитика</h5>
                        <p class="text-secondary small mb-0">Следите за прогрессом обучения, вовлечённостью и результатами всей команды в реальном времени.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 fade-in-up">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4 text-center">
                        <div class="display-6 mb-3">💼</div>
                        <h5 class="fw-semibold mb-2">Корпоративные тарифы</h5>
                        <p class="text-secondary small mb-0">Гибкая система оплаты и индивидуальные предложения в тенге — без переплат.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 fade-in-up">
                <div class="card border-0 shadow-sm h-100 rounded-4">
                    <div class="card-body p-4 text-center">
                        <div class="display-6 mb-3">🎯</div>
                        <h5 class="fw-semibold mb-2">Целевая эффективность</h5>
                        <p class="text-secondary small mb-0">Фокус на реальных навыках и бизнес-результатах, а не просто на прохождении курсов.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- СЕКЦИЯ ЦЕН -->
<section class="py-5 bg-white">
    <div class="container py-4">
        <div class="text-center mb-5 fade-in-up">
            <h2 class="fw-bold mb-3">Тарифы для компаний</h2>
            <p class="text-secondary">Прозрачная стоимость, рассчитанная в тенге 🇰🇿</p>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-4 fade-in-up">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">
                    <div class="card-body p-4">
                        <h5 class="fw-semibold mb-3">Старт</h5>
                        <h3 class="fw-bold text-dark mb-4">₸49 000 / мес</h3>
                        <p class="text-secondary small mb-0">До 10 сотрудников, базовая аналитика, онлайн-поддержка.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 fade-in-up">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center bg-dark text-white">
                    <div class="card-body p-4">
                        <h5 class="fw-semibold mb-3">Бизнес</h5>
                        <h3 class="fw-bold mb-4">₸149 000 / мес</h3>
                        <p class="small mb-0">До 50 сотрудников, расширенная аналитика, персональный менеджер.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 fade-in-up">
                <div class="card border-0 shadow-sm rounded-4 h-100 text-center">
                    <div class="card-body p-4">
                        <h5 class="fw-semibold mb-3">Энтерпрайз</h5>
                        <h3 class="fw-bold text-dark mb-4">₸299 000 / мес</h3>
                        <p class="text-secondary small mb-0">Безлимитное число сотрудников, кастомные курсы, приоритетная поддержка 24/7.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* --- Анимация появления --- */
.fade-in-up {
    opacity: 0;
    transform: translateY(40px);
    animation: fadeUp 1.2s ease-out forwards;
    animation-delay: 0.3s;
}
@keyframes fadeUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* --- Волновая анимация --- */
@keyframes waveMove {
    0% { transform: translateX(0); }
    100% { transform: translateX(-40px); }
}

/* --- Адаптивность --- */
@media (max-width: 768px) {
    h1.display-4 { font-size: 2rem; }
    h2 { font-size: 1.6rem; }
    p.lead { font-size: 1rem; }
}
</style>
@endpush
