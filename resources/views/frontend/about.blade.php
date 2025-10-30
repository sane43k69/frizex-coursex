@extends('frontend.layouts.app')
@section('title', 'Информация')
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
                    <a href="about" class="fs-6 text-secondary">О нас</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- About Intro Starts Here -->
<section class="about-intro section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 position-relative mt-4 mt-lg-0" style="z-index: 0;">
                <div class="about-intro__img-wrapper">
                    <img src="{{asset('frontend/dist/images/about/intro.jpg')}}" alt="Intro Image"
                        class="img-fluid rounded-2 ms-lg-5 position-relative intro-image" />
                </div>
                <div class="intro-shape">
                    <img src="{{asset('frontend/dist/images/shape/rec04.png')}}" alt="Shape"
                        class="img-fluid shape-01" />
                    <img src="{{asset('frontend/dist/images/shape/dots/dots-img-09.png')}}" alt="Shape"
                        class="img-fluid shape-02" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-intro__textContent">
                    <h2 class="font-title--md mb-3">Отличное место для роста.</h2>
                    <p class="mt-2 mt-lg-1 mb-2 mb-lg-4 text-secondary">
Эффективное накопление вестибюля помогает развитию. Ульям корпер ронкус — это способ. Фазеллус интердум рутрум способствует развитию. Нулла и сапиен в турпис виверра. Краш одийо экс, расположение ид эст эт, виверра кондиментум фелис.
                    </p>
                    <p class="text-secondary">
                       
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Intro Ends Here -->

<!-- About Feature Starts Here -->
<section class="section aboutFeature pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-feature dark-feature">
                    <h5 class="text-white font-title--sm">Кто мы такие</h5>
                    <p class="text-lowblack">


Мы — команда профессионалов, создающих качественные решения и помогающих вам достигать целей. Ценим инновации, ответственность и развитие. Стремимся сделать мир удобнее и ярче с помощью технологий и человеческого подхода.

                    </p>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="about-feature">
                    <h5 class="font-title--sm">Наша миссия</h5>
                    <p class="text-secondary">
Наша миссия — сделать качественное образование доступным каждому.
Мы верим, что знания меняют жизни, а современные технологии позволяют учиться в любое время и в любом месте.

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Feature Ends Here -->

<!-- Brands Starts Here -->
<section class="section overflow-hidden brands pb-lg-0">
    <div class="bg-secondary py-80">
        <div class="container">
            <div class="row mb-40">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="brands__titleContent">
                        <h5 class="mb-2 dark-text font-title--sm">
                            Более 30 000 школ и колледжей учатся вместе с нами.
                        </h5>
                        <p class="font-para--lg">
Образование становится доступнее благодаря нашему опыту и поддержке.

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-area">
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/1.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/2.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/3.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/4.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/2.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/5.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Brands Ends Here -->

<!-- Best Instructors Starts Here -->
<section class="section best-instructor-featured overflow-hidden main-instructor-featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative">
                <h2 class="text-center mb-40 font-title--md">Познакомьтесь с нашими лучшими преподавателями</h2>
                <div class="ourinstructor__wrapper mt-lg-5 mt-0">
                    <div class="ourinstructor-active">
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('frontend/dist/images/instructor/inst/1.png')}}"
                                    alt="Mentor image" />
                            </div>
                            <div class="mentor__title">
                                <h6>
                                    <a href="instructor-profile" tabindex="0">Юрий Бошников</a>
                                </h6>
                                <p>Веб-дизайнер</p>
                            </div>
                        </div>
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('frontend/dist/images/instructor/inst/2.png')}}"
                                    alt="Mentor image" />

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mentor__title">
                                <h6>
                                    <a href="instructor-profile" tabindex="0">Yuriy Allakhverdov</a>
                                </h6>
                                <p>Full-Stack Developer</p>
                            </div>
                        </div>
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('frontend/dist/images/instructor/inst/3.png')}}"
                                    alt="Mentor image" />

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mentor__title">
                                <h6>
                                    <a href="instructor-profile" tabindex="0">Дмитрий Норка </a>
                                </h6>
                                <p>Бизнес-тренер</p>
                            </div>
                        </div>
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('frontend/dist/images/instructor/inst/4.png')}}"
                                    alt="Mentor image" />

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mentor__title">
                                <h6>
                                    <a href="instructor-profile" tabindex="0">Курманова Дарья</a>
                                </h6>
                                <p>Профессиональный портретный и фэшн фотограф</p>
                            </div>
                        </div>
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('frontend/dist/images/instructor/inst/5.png')}}"
                                    alt="Mentor image" />

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mentor__title">
                                <h6><a href="instructor-profile" tabindex="0">Олеся Соколова</a></h6>
                                <p>Преподаватель академических дисциплин</p>
                            </div>
                        </div>
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('frontend/dist/images/instructor/inst/6.png')}}"
                                    alt="Mentor image" />

                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#" tabindex="0">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mentor__title">
                                <h6>
                                    <a href="instructor-profile" tabindex="0">Илья Фофанов</a>
                                </h6>
                                <p>Бизнес-тренер по цифровой грамотности</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-instructor-featured-shape">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-14.png')}}" alt="shape"
            class="img-fluid shape01" />
        <img src="{{asset('frontend/dist/images/shape/triangel2.png')}}" alt="shape" class="img-fluid shape02" />
    </div>
</section>
@endsection

@push('scripts')
@endpush