@extends('frontend.layouts.app')
@section('title', 'Политика конфиденциальности')
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
                    <a href="privacy-policy" class="fs-6 text-secondary">Политика конфиденциальности</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Privacy Policy Section Starts Here -->
<section class="section privacy-policy py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="text-center mb-5 font-title--md">Политика конфиденциальности</h2>

                <div class="accordion" id="privacyAccordion">

                    @php
                        $policies = [
                            [
                                'title' => 'Сбор информации',
                                'content' => 'Мы собираем информацию, которую вы предоставляете при регистрации и использовании платформы, включая имя, email, данные платежей и активность на сайте.'
                            ],
                            [
                                'title' => 'Использование информации',
                                'content' => 'Данные используются для предоставления образовательных услуг, улучшения качества платформы и связи с пользователями.'
                            ],
                            [
                                'title' => 'Передача данных третьим лицам',
                                'content' => 'Мы не продаем и не передаем ваши личные данные сторонним компаниям без вашего согласия, за исключением случаев, предусмотренных законом.'
                            ],
                            [
                                'title' => 'Безопасность данных',
                                'content' => 'Мы применяем современные меры защиты информации, включая шифрование, резервное копирование и ограничение доступа к данным.'
                            ],
                            [
                                'title' => 'Изменения политики',
                                'content' => 'Политика конфиденциальности может быть обновлена. Все изменения публикуются на этой странице, и дата обновления указывается в начале документа.'
                            ],
                        ];
                    @endphp

                    @foreach($policies as $index => $policy)
                        <div class="accordion-item mb-3 shadow-sm rounded border" style="border-color: #ddd;">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                    aria-controls="collapse{{ $index }}"
                                    style="font-weight:500; font-size:1.05rem; color:#333;">
                                    <span class="me-2">
                                        <i class="bi {{ $index === 0 ? 'bi-dash-lg' : 'bi-plus-lg' }}"></i>
                                    </span>
                                    {{ $policy['title'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" 
                                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                 aria-labelledby="heading{{ $index }}" 
                                 data-bs-parent="#privacyAccordion">
                                <div class="accordion-body" style="font-size:0.95rem; color:#555;">
                                    <p>{{ $policy['content'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- Decorative Shapes -->
    <div class="privacy-shapes position-relative">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-14.png')}}" alt="shape" class="img-fluid shape01 position-absolute" style="top:10%; left:5%;"/>
        <img src="{{asset('frontend/dist/images/shape/triangel2.png')}}" alt="shape" class="img-fluid shape02 position-absolute" style="bottom:5%; right:10%;"/>
    </div>
</section>
<!-- Privacy Policy Section Ends Here -->
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
