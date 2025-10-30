@extends('frontend.layouts.app')
@section('title', 'Часто задаваемые вопросы')
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
                    <a href="faq" class="fs-6 text-secondary">FAQ</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- FAQ Section Starts Here -->
<section class="section faq-area py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center mb-5 font-title--md">Часто задаваемые вопросы</h2>
                <div class="accordion" id="faqAccordion">

                    @php
                        $faqs = [
                            [
                                'question' => 'Как зарегистрироваться на платформе?',
                                'answer' => 'Чтобы зарегистрироваться, нажмите кнопку "Регистрация" в верхнем меню и заполните все поля формы.'
                            ],
                            [
                                'question' => 'Как преподаватели могут продавать свои курсы?',
                                'answer' => 'Преподаватели создают аккаунт с ролью "Teacher", после чего им доступен раздел "Создать курс".'
                            ],
                            [
                                'question' => 'Какие способы оплаты доступны?',
                                'answer' => 'Мы поддерживаем оплату картами Visa/MasterCard и электронными кошельками.'
                            ],
                            [
                                'question' => 'Можно ли получить сертификат после курса?',
                                'answer' => 'Да, после успешного завершения курса вы можете скачать электронный сертификат.'
                            ],
                            [
                                'question' => 'Как связаться с поддержкой?',
                                'answer' => 'Для связи с поддержкой используйте форму обратной связи внизу страницы или пишите на support@example.com.'
                            ],
                        ];
                    @endphp

                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-3 shadow-sm border rounded" style="border-color: #ddd;">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                    aria-controls="collapse{{ $index }}"
                                    style="font-weight:500; font-size:1.05rem; color:#333;">
                                    <span class="me-2">
                                        <i class="bi {{ $index === 0 ? 'bi-dash-lg' : 'bi-plus-lg' }}"></i>
                                    </span>
                                    {{ $faq['question'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" 
                                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                 aria-labelledby="heading{{ $index }}" 
                                 data-bs-parent="#faqAccordion">
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

    <!-- Optional: Decorative Shapes -->
    <div class="faq-shapes">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-14.png')}}" alt="shape" class="img-fluid shape01" />
        <img src="{{asset('frontend/dist/images/shape/triangel2.png')}}" alt="shape" class="img-fluid shape02" />
    </div>
</section>
<!-- FAQ Section Ends Here -->
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    const accordions = document.querySelectorAll('.accordion-button');
    accordions.forEach(btn => {
        btn.addEventListener('click', function() {
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-plus-lg');
            icon.classList.toggle('bi-dash-lg');
        });
    });
});
</script>
@endpush
