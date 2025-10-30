@extends('frontend.layouts.app')
@section('title', 'Помощь & Поддержка')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/" class="fs-6 text-secondary">Главная страница</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="help-support" class="fs-6 text-secondary">Помощь & Поддержка</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Help & Support Section Starts Here -->
<section class="section help-support py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-10 mx-auto text-center">
                <h2 class="mb-3 font-title--md">Помощь & Поддержка</h2>
                <p class="text-secondary">Найдите ответы на часто задаваемые вопросы или свяжитесь с нашей поддержкой.</p>
            </div>
        </div>

        <!-- Search Input -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto">
                <input type="text" id="faqSearch" class="form-control shadow-sm rounded" placeholder="Поиск по вопросам..." />
            </div>
        </div>

        <!-- FAQ Categories Filter -->
        <div class="row mb-4">
            <div class="col-lg-10 mx-auto text-center">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    @php
                        $categories = ['Все', 'Регистрация', 'Курсы', 'Платежи', 'Поддержка'];
                    @endphp
                    @foreach($categories as $cat)
                        <button class="btn btn-outline-secondary btn-sm faq-category" data-category="{{ $cat }}">{{ $cat }}</button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- FAQ Accordion -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="accordion" id="helpAccordion">

                    @php
                        $faqs = [
                            ['question'=>'Как зарегистрироваться на платформе?','answer'=>'Нажмите "Регистрация", заполните форму и подтвердите email.','category'=>'Регистрация'],
                            ['question'=>'Как восстановить пароль?','answer'=>'Используйте ссылку "Забыли пароль?" на странице входа.','category'=>'Регистрация'],
                            ['question'=>'Как оплатить курс?','answer'=>'Выберите курс, нажмите "Купить" и следуйте инструкциям.','category'=>'Платежи'],
                            ['question'=>'Могу ли я получить сертификат?','answer'=>'На текущей версии платформы сертификаты не выдаются.','category'=>'Курсы'],
                            ['question'=>'Как связаться с поддержкой?','answer'=>'Напишите на support@elearning.com или используйте форму обратной связи.','category'=>'Поддержка'],
                        ];
                    @endphp

                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-3 shadow-sm rounded border faq-item" 
                             data-category="{{ $faq['category'] }}" 
                             style="border-color: #ddd; opacity:0; transform:translateY(20px); transition: all 0.5s;">
                            <h2 class="accordion-header" id="faqHeading{{ $index }}">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}" 
                                    aria-expanded="false" 
                                    aria-controls="faqCollapse{{ $index }}"
                                    style="font-weight:500; font-size:1.05rem; color:#333;">
                                    <span class="me-2">
                                        <i class="bi bi-question-circle-fill text-primary"></i>
                                    </span>
                                    {{ $faq['question'] }}
                                </button>
                            </h2>
                            <div id="faqCollapse{{ $index }}" 
                                 class="accordion-collapse collapse" 
                                 aria-labelledby="faqHeading{{ $index }}" 
                                 data-bs-parent="#helpAccordion">
                                <div class="accordion-body" style="font-size:0.95rem; color:#555;">
                                    <p>{{ $faq['answer'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Shapes -->
    <div class="help-shapes position-relative">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-14.png')}}" alt="shape" class="img-fluid shape01 position-absolute" style="top:10%; left:5%;"/>
        <img src="{{asset('frontend/dist/images/shape/triangel2.png')}}" alt="shape" class="img-fluid shape02 position-absolute" style="bottom:5%; right:10%;"/>
    </div>
</section>
<!-- Help & Support Section Ends Here -->
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Toggle icons on accordion open/close
    const accordions = document.querySelectorAll('.accordion-button');
    accordions.forEach(btn => {
        btn.addEventListener('click', function() {
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-plus-lg');
            icon.classList.toggle('bi-dash-lg');
        });
    });

    // Search functionality
    const searchInput = document.getElementById('faqSearch');
    searchInput.addEventListener('input', function() {
        const value = this.value.toLowerCase();
        document.querySelectorAll('.faq-item').forEach(item => {
            const text = item.querySelector('.accordion-button').textContent.toLowerCase();
            item.style.display = text.includes(value) ? '' : 'none';
        });
    });

    // Category filter
    document.querySelectorAll('.faq-category').forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            document.querySelectorAll('.faq-item').forEach(item => {
                if(category === 'Все' || item.dataset.category === category) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });

    // Scroll animation
    const faqItems = document.querySelectorAll('.faq-item');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.2 });

    faqItems.forEach(item => observer.observe(item));
});
</script>
@endpush
