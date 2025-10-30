@extends('frontend.layouts.app')
@section('title', 'Партнёрская программа')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
<!-- Breadcrumb -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="fs-6 text-secondary">Главная страница</a></li>
                <li class="breadcrumb-item active"><a href="affiliate" class="fs-6 text-secondary">Партнёрская программа</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Intro Section -->
<section class="affiliate-intro section py-5 position-relative overflow-hidden">
    <div class="shape-top position-absolute top-0 start-0 w-100">
        <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/17282/17282992.png') }}" alt="Shape" class="img-fluid opacity-25">
    </div>
    <div class="container position-relative z-index-1">
        <div class="row align-items-center">
            <div class="col-lg-6 position-relative mt-4 mt-lg-0">
                <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/17282/17282992.png') }}" alt="Affiliate Program" class="img-fluid rounded-2 shadow-lg intro-image">
                <div class="intro-shapes position-absolute top-0 start-0">
                    <img src="{{ asset('frontend/dist/images/shape/triangel2.png') }}" class="img-fluid shape01" alt="shape">
                    <img src="{{ asset('frontend/dist/images/shape/circle.png') }}" class="img-fluid shape02" alt="shape">
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="font-title--md mb-4" style="background: linear-gradient(135deg, #0d6efd, #6610f2); -webkit-background-clip: text; color: transparent;">
                    Присоединяйтесь к нашей партнёрской программе
                </h2>
                <p class="text-secondary fs-5 mb-4">
                    Получайте доход за привлечение новых пользователей и помогайте развивать образование. Прозрачная система выплат и удобный личный кабинет.
                </p>
                <a href="#benefits" class="btn btn-gradient btn-lg fw-bold"><i class="fas fa-hand-holding-usd me-2"></i>Узнать подробнее</a>
            </div>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section id="benefits" class="section affiliate-benefits py-5 bg-light position-relative overflow-hidden">
    <div class="shape-bottom position-absolute bottom-0 end-0 w-100">
        <img src="{{ asset('frontend/dist/images/shape/dots/dots-img-12.png') }}" alt="Shape" class="img-fluid opacity-25">
    </div>
    <div class="container position-relative z-index-1">
        <div class="row text-center mb-5">
            <div class="col-lg-12">
                <h2 class="font-title--md mb-3" style="background: linear-gradient(135deg, #0d6efd, #6610f2); -webkit-background-clip: text; color: transparent;">Преимущества программы</h2>
                <p class="text-secondary fs-5">Почему стоит стать нашим партнёром</p>
            </div>
        </div>
        <div class="row g-4">
            @php
                $benefits = [
                    ['icon'=>'fas fa-coins','title'=>'Высокие комиссии','desc'=>'Щедрое вознаграждение за каждого привлечённого пользователя.'],
                    ['icon'=>'fas fa-handshake','title'=>'Прозрачность','desc'=>'Все действия и выплаты видны в личном кабинете.'],
                    ['icon'=>'fas fa-chart-line','title'=>'Статистика и аналитика','desc'=>'Детальная аналитика помогает отслеживать эффективность.'],
                    ['icon'=>'fas fa-users','title'=>'Поддержка 24/7','desc'=>'Наша команда всегда готова помочь с вопросами и советами.'],
                ];
            @endphp

            @foreach($benefits as $benefit)
            <div class="col-lg-3 col-md-6">
                <div class="card affiliate-card shadow-lg border-0 p-4 text-center h-100 wow fadeInUp" data-wow-delay="0.{{ $loop->index }}s">
                    <div class="icon mb-3">
                        <i class="{{ $benefit['icon'] }} fa-3x text-gradient"></i>
                    </div>
                    <h5 class="fw-bold">{{ $benefit['title'] }}</h5>
                    <p class="text-secondary">{{ $benefit['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section affiliate-steps py-5 position-relative overflow-hidden">
    <div class="container position-relative z-index-1">
        <div class="row text-center mb-5">
            <div class="col-lg-12">
                <h2 class="font-title--md mb-3" style="background: linear-gradient(135deg, #0d6efd, #6610f2); -webkit-background-clip: text; color: transparent;">Как это работает</h2>
                <p class="text-secondary fs-5">Всего 3 простых шага для начала</p>
            </div>
        </div>
        <div class="row g-4">
            @php
                $steps = [
                    ['step'=>'1','title'=>'Регистрация','desc'=>'Создайте аккаунт в партнёрской программе.','icon'=>'fas fa-user-plus'],
                    ['step'=>'2','title'=>'Привлечение','desc'=>'Делитесь ссылками и приглашайте новых пользователей.','icon'=>'fas fa-share-alt'],
                    ['step'=>'3','title'=>'Заработок','desc'=>'Получайте комиссию за каждую регистрацию и покупку.','icon'=>'fas fa-coins'],
                ];
            @endphp

            @foreach($steps as $step)
            <div class="col-lg-4 col-md-6">
                <div class="card affiliate-step-card shadow-lg border-0 p-4 text-center h-100 wow fadeInUp" data-wow-delay="0.{{ $loop->index }}s">
                    <div class="icon mb-3">
                        <i class="{{ $step['icon'] }} fa-3x text-gradient"></i>
                    </div>
                    <h5 class="fw-bold">Шаг {{ $step['step'] }}: {{ $step['title'] }}</h5>
                    <p class="text-secondary">{{ $step['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section affiliate-cta py-5 bg-gradient text-white text-center position-relative overflow-hidden">
    <div class="container position-relative z-index-1">
        <h2 class="mb-3 font-title--md">Начните зарабатывать уже сегодня!</h2>
        <p class="mb-4 fs-5">Присоединяйтесь к партнёрской программе и получайте доход с первых пользователей.</p>
    </div>
    <div class="cta-shapes position-absolute top-0 start-0 w-100 h-100">
        <img src="{{ asset('frontend/dist/images/shape/dots/dots-img-14.png') }}" class="img-fluid opacity-25" alt="shape">
        <img src="{{ asset('frontend/dist/images/shape/triangel2.png') }}" class="img-fluid shape02" alt="shape">
    </div>
</section>
@endsection

@push('scripts')
<style>
/* Градиент текста для иконок */
.text-gradient { background: linear-gradient(135deg, #0d6efd, #6610f2); -webkit-background-clip: text; color: transparent; }

/* Карточки */
.affiliate-card, .affiliate-step-card {
    border-radius: 25px;
    transition: transform 0.5s, box-shadow 0.5s;
    background: #fff;
}
.affiliate-card:hover, .affiliate-step-card:hover {
    transform: translateY(-15px) scale(1.03);
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
}

/* Иконки */
.affiliate-card .icon, .affiliate-step-card .icon {
    transition: transform 0.3s;
}
.affiliate-card:hover .icon, .affiliate-step-card:hover .icon {
    transform: scale(1.2);
}

/* Intro Image */
.intro-image { border-radius: 25px; }

/* Buttons */
.btn-gradient {
    border-radius:50px;
    padding:12px 35px;
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    color:#fff;
    font-weight:600;
    transition: all 0.3s;
}
.btn-gradient:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow:0 15px 35px rgba(0,0,0,0.25);
}

/* CTA Gradient */
.bg-gradient {
    background: linear-gradient(135deg, #0d6efd, #6610f2);
}

/* Анимация появлений */
.wow { opacity:0; transform: translateY(50px); transition: all 0.8s ease-out; }
.wow.fadeInUp.visible { opacity:1; transform: translateY(0); }

/* Фигуры */
.shape01, .shape02 { position:absolute; width:80px; opacity:0.15; }
.shape01 { top:-20px; right:20px; }
.shape02 { bottom:-20px; left:20px; }
</style>

<script>
// Появление при скролле
document.addEventListener("DOMContentLoaded", function() {
    const wowItems = document.querySelectorAll('.wow');
    const observer = new IntersectionObserver(entries=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){ entry.target.classList.add('visible'); }
        });
    }, { threshold:0.2 });
    wowItems.forEach(item=>observer.observe(item));
});
</script>
@endpush
