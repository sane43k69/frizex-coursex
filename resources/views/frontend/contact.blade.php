@extends('frontend.layouts.app')
@section('title', 'Контакты')
@section('header-attr') class="nav-shadow" @endsection

@section('content')

<!-- Breadcrumb Starts Here -->
<div class="py-0 section--bg-white">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pb-0 mb-0">
                <li class="breadcrumb-item"><a href="/" class="fs-6 text-secondary">Главная страница</a></li>
                <li class="breadcrumb-item active"><a href="contact" class="fs-6 text-secondary">Контакты</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Contact Hero Area Starts Here -->
<section class="section section--bg-white hero hero--one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero__img-content">
                    <div class="hero__img-content--main">
                        <img src="{{asset('frontend/dist/images/contact/image.jpg')}}" alt="image" />
                    </div>
                    <img src="{{asset('frontend/dist/images/shape/dots/dots-img-02.png')}}" alt="shape"
                        class="hero__img-content--shape-01" />
                    <img src="{{asset('frontend/dist/images/shape/rec05.png')}}" alt="shape"
                        class="hero__img-content--shape-02" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero__content-info">
                    <h2 class="font-title--md mb-0">Наши филиалы</h2>
                    <p class="font-para--lg">
                       Мы стремимся к гибкости и точности во всём. Каждый элемент продуман до мелочей, чтобы обеспечить стабильность, удобство и гармоничный внешний вид.
                    </p>
                    <ul class="hero__content-location">
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>Almaty, Kazakhstan</p>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get in Touch Area Starts Here -->
<section class="section getin-touch overflow-hidden"
    style="background-image: url({{asset('frontend/dist/images/contact/bg.png')}});">
    <div class="container">
        <div class="row">
            <h2 class="font-title--md text-center">Свяжитесь с нами</h2>
            <div class="col-lg-5 pe-lg-4 position-relative mb-4 mb-lg-0">
                <div class="contact-feature d-flex align-items-center">
                    <div class="contact-feature-icon primary-bg">
                     <i class="fas fa-map-marked-alt fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>Адрес</h6>
                        <p>Улица Абая. Дом 200</p>
                        <p>050000</p>
                    </div>
                </div>

                <div class="contact-feature d-flex align-items-center my-lg-4 my-3">
                    <div class="contact-feature-icon tertiary-bg">
                        <i class="far fa-envelope fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>Адрес Электронной почты</h6>
                        <h5>hr@coursex.com</h5>
                    </div>
                </div>

                <div class="contact-feature d-flex align-items-center">
                    <div class="contact-feature-icon success-bg">
                       <i class="fas fa-phone-alt fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>Телефон</h6>
                        <h5>+7 777 777 0707</h5>
                    </div>
                </div>
                <img src="{{asset('frontend/dist/images/shape/dots/dots-img-03.png')}}" alt="Shape"
                    class="img-fluid contact-feature-shape" />
            </div>
            <div class="col-lg-7 form-area">
                <form action="#">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label for="name">Имя</label>
                            <input type="text" class="form-control form-control--focused" placeholder="Заполнить"
                                id="name" />
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Адрес Электронной Почты</label>
                            <input type="email" class="form-control" placeholder="Заполнить" id="email" />
                        </div>
                    </div>
                    <div class="row my-lg-2 my-2">
                        <div class="col-12">
                            <label for="subject">Тема</label>
                            <input type="text" id="subject" class="form-control" placeholder="Заполнить" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="message">Сообщение</label>
                            <textarea id="message" placeholder="Заполнить" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-end">
                            <button type="submit" class="button button-lg button--primary fw-normal">Отправить
                                Сообщение</button>
                        </div>
                    </div>
                </form>
                <div class="form-area-shape">
                    <img src="{{asset('frontend/dist/images/shape/circle3.png')}}" alt="Shape"
                        class="img-fluid shape-01" />
                    <img src="{{asset('frontend/dist/images/shape/circle5.png')}}" alt="Shape"
                        class="img-fluid shape-02" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Get in Touch Area Ends Here -->

<!-- Map Area Starts Here -->
<div class="map-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map-area-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2907.4262173547713!2d76.85465329001177!3d43.221522736811664!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2skz!4v1760458869713!5m2!1sru!2skz"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Map Area Ends Here -->

@endsection