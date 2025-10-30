@extends('frontend.layouts.app')
@section('title', 'Главная страница')
@section('footer-class') footer--two @endsection


@section('content')

<!-- Banner Starts Here -->
<section class="main-banner" style="background-image: url({{asset('frontend/dist/images/banner/banner.jpg')}});">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 mb-lg-0 order-2 order-lg-0 d-flex align-items-center">
                <div class="banner-two-start">
                    <h1 class="font-title--lg">ОТКРЫВАЙТЕ ЗНАНИЯ В ЛЮБОЕ ВРЕМЯ И В ЛЮБОМ МЕСТЕ ВМЕСТЕ С ЭКСПЕРТАМИ.</h1>
                    <p>
                       Мы стремимся помочь вам найти лучшие онлайн-курсы, предоставляя экспертные знания в любое время и в любом месте.
                    </p>
                    <form>
                    
                    </form>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-0">
                <div class="main-banner-end">
                    <img src="{{asset('frontend/dist/images/banner/banner-image-01.png')}}" alt="image"
                        class="img-fluid" width="515" height="700"/>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Browse Categories Starts Here -->
<section class="section browse-categories">
    <div class="container">
        <h2 class="font-title--md text-center mb-0">Просматривайте курсы по популярным категориям</h2>
        <div class="browse-categories__wrapper position-relative">
            <div class="categories--box">
                @forelse ($category as $cat)
                @php
                // Fetch the count of courses for each category
                $courseCount = $cat->course()->count();
                @endphp
                <div class="browse-categories-item default-item-one mb-2">
                    <div class="browse-categories-item-icon">
                        <div class="categories-one default-categories">
                            <img src="{{asset('uploads/courseCategories/'.$cat->category_image)}}"
                                class="rounded-circle" width="80" height="80" alt="">
                        </div>
                    </div>
                    <div class="browse-categories-item-text">
                        <h6 class="font-title--card"><a href="searchCourse">{{$cat->category_name}}</a></h6>
                        <p>{{ $courseCount }} Courses</p>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{route('searchCourse')}}" class="button button-lg button--primary mt-5">Просмотреть все курсы</a>
            </div>
        </div>
    </div>
    <div class="browse-categories-shape">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-11.png')}}" alt="shape"
            class="img-fluid shape-01" />
        <img src="{{asset('frontend/dist/images/shape/line01.png')}}" alt="shape" class="img-fluid shape-02" />
    </div>
</section>

<style>
.categories--box {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.browse-categories-item {
    flex: 0 0 200px; /* фиксированная ширина карточки */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    text-align: center;
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    min-height: 250px; /* 👈 одинаковая высота */
}

.browse-categories-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 16px rgba(0,0,0,0.1);
}

.browse-categories-item-text h6 {
    min-height: 40px; /* 👈 фиксируем высоту заголовка */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.browse-categories-item-text p {
    margin: 0;
}
</style>


<!--  Popular Courses Starts Here -->
<section class="section section--bg-offwhite-three featured-popular-courses main-popular-course">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured-popular-courses-heading d-flex align-content-center justify-content-between">
                    <div class="main-heading">
                        <h3 class="font-title--md">НАШИ ПОПУЛЯРНЫЕ КУРСЫ</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row">
                        @forelse ($popularCourses as $pc)
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <div class="contentCard-top">
                                    <a href="#"><img src="{{asset('uploads/courses/'.$pc->image)}}" alt="images"
                                            class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $pc->id)])}}"
                                            class="font-title--card">{{$pc->title_en}}</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="{{route('instructorProfile', encryptor('encrypt', $pc->instructor?->id))}}"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('uploads/users/'.$pc?->instructor->image)}}"
                                                alt="client-image" class="rounded-circle" height="34" width="34" />
                                            <p class="font-para--md">{{$pc?->instructor->name_en}}</p>
                                        </a>
                                        <div class="price">
                                            <span>{{$pc->price?'₸'.$pc->price:'Free'}}</span>
                                            <del>{{$pc->old_price?'₸'.$pc->old_price:''}}</del>
                                        </div>
                                    </div>
                                    <!-- <div class="contentCard-more">
                                        <div class="d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/star.png')}}"
                                                    alt="star" />
                                            </div>
                                            <span>4.5</span>
                                        </div>
                                        <div class="eye d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/eye.png')}}"
                                                    alt="eye" />
                                            </div>
                                           
                                        </div>
                                        <div class="book d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/book.png')}}"
                                                    alt="location" />
                                            </div>
                                            <span>{{$pc->lesson?$pc->lesson:0}} Lesson</span>
                                        </div>
                                        <div class="clock d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/Clock.png')}}"
                                                    alt="clock" />
                                            </div>
                                            <span>{{$pc->duration?$pc->duration:0}} Hours</span>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <h3>Курсы отсутствуют</h3>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('searchCourse')}}" class="button button-lg button--primary">Просмотреть все курсы</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-design" role="tabpanel" aria-labelledby="pills-design-tab">
                    <div class="row">
                        @forelse ($designCourses as $dc)
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <div class="contentCard-top">
                                    <a href="#"><img src="{{asset('uploads/courses/'.$dc->image)}}" alt="images" class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $dc->id)])}}"
                                            class="font-title--card">{{$dc->title_en}}</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="{{route('instructorProfile', encryptor('encrypt', $dc->instructor?->id))}}"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('uploads/users/'.$dc?->instructor->image)}}" alt="client-image"
                                                class="rounded-circle" height="34" width="34" />
                                            <p class="font-para--md">{{$dc?->instructor->name_en}}</p>
                                        </a>
                                        <div class="price">
                                            <span>{{$dc->price?'₸'.$dc->price:'Free'}}</span>
                                            <del>{{$dc->old_price?'₸'.$dc->old_price:''}}</del>
                                        </div>
                                    </div>
                                    <div class="contentCard-more">
                                        <div class="d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/star.png')}}" alt="star" />
                                            </div>
                                            <span>4.5</span>
                                        </div>
                                        <div class="eye d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/eye.png')}}" alt="eye" />
                                            </div>
                                            
                                        </div>
                                        <div class="book d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/book.png')}}" alt="location" />
                                            </div>
                                            <span>{{$dc->lesson?$dc->lesson:0}} Lesson</span>
                                        </div>
                                        <div class="clock d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/Clock.png')}}" alt="clock" />
                                            </div>
                                            <span>{{$dc->duration?$dc->duration:0}} Hours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <h3>No Courses Available</h3>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('searchCourse')}}" class="button button-lg button--primary">Browse all
                                Courses</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-dev" role="tabpanel" aria-labelledby="pills-dev-tab">
                    <div class="row">
                        @forelse ($developmentCourses as $dv)
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <div class="contentCard-top">
                                    <a href="#"><img src="{{asset('uploads/courses/'.$dv->image)}}" alt="images"
                                            class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $dv->id)])}}"
                                            class="font-title--card">{{$dv->title_en}}</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="{{route('instructorProfile', encryptor('encrypt', $dv->instructor?->id))}}"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('uploads/users/'.$dv?->instructor->image)}}" alt="client-image"
                                                class="rounded-circle" height="34" width="34" />
                                            <p class="font-para--md">{{$dv?->instructor->name_en}}</p>
                                        </a>
                                        <div class="price">
                                            <span>{{$dv->price?'₸'.$dv->price:'Free'}}</span>
                                            <del>{{$dv->old_price?'₸'.$dv->old_price:''}}</del>
                                        </div>
                                    </div>
                                    <div class="contentCard-more">
                                        <div class="d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/star.png')}}" alt="star" />
                                            </div>
                                            <span>4.5</span>
                                        </div>
                                        <div class="eye d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/eye.png')}}" alt="eye" />
                                            </div>
                                           
                                        </div>
                                        <div class="book d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/book.png')}}" alt="location" />
                                            </div>
                                            <span>{{$dv->lesson?$dv->lesson:0}} Lesson</span>
                                        </div>
                                        <div class="clock d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/Clock.png')}}" alt="clock" />
                                            </div>
                                            <span>{{$dv->duration?$dv->duration:0}} Hours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <h3>No Courses Available</h3>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('searchCourse')}}" class="button button-lg button--primary">Browse all
                                Courses</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-bus" role="tabpanel" aria-labelledby="pills-bus-tab">
                    <div class="row">
                        @forelse ($businessCourses as $bc)
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <div class="contentCard-top">
                                    <a href="#"><img src="{{asset('uploads/courses/'.$bc->image)}}" alt="images"
                                            class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $bc->id)])}}"
                                            class="font-title--card">{{$bc->title_en}}</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="{{route('instructorProfile', encryptor('encrypt', $bc->instructor?->id))}}"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('uploads/users/'.$bc?->instructor->image)}}" alt="client-image"
                                                class="rounded-circle" height="34" width="34" />
                                            <p class="font-para--md">{{$bc?->instructor->name_en}}</p>
                                        </a>
                                        <div class="price">
                                            <span>{{$bc->price?'₸'.$bc->price:'Free'}}</span>
                                            <del>{{$bc->old_price?'₸'.$bc->old_price:''}}</del>
                                        </div>
                                    </div>
                                    <div class="contentCard-more">
                                        <div class="d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/star.png')}}" alt="star" />
                                            </div>
                                            <span>4.5</span>
                                        </div>
                                        <div class="eye d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/eye.png')}}" alt="eye" />
                                            </div>
                                          
                                        </div>
                                        <div class="book d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/book.png')}}" alt="location" />
                                            </div>
                                            <span>{{$bc->lesson?$bc->lesson:0}} Lesson</span>
                                        </div>
                                        <div class="clock d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/Clock.png')}}" alt="clock" />
                                            </div>
                                            <span>{{$bc->duration?$bc->duration:0}} Hours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <h3>No Courses Available</h3>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('searchCourse')}}" class="button button-lg button--primary">Browse all
                                Courses</a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-its" role="tabpanel" aria-labelledby="pills-its-tab">
                    <div class="row">
                        @forelse ($itCourses as $ic)
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <div class="contentCard-top">
                                    <a href="#"><img src="{{asset('uploads/courses/'.$ic->image)}}" alt="images"
                                            class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $ic->id)])}}"
                                            class="font-title--card">{{$ic->title_en}}</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="{{route('instructorProfile', encryptor('encrypt', $ic->instructor?->id))}}"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('uploads/users/'.$ic?->instructor->image)}}" alt="client-image"
                                                class="rounded-circle" height="34" width="34" />
                                            <p class="font-para--md">{{$ic?->instructor->name_en}}</p>
                                        </a>
                                        <div class="price">
                                            <span>{{$ic->price?'₸'.$ic->price:'Free'}}</span>
                                            <del>{{$ic->old_price?'₸'.$ic->old_price:''}}</del>
                                        </div>
                                    </div>
                                    <div class="contentCard-more">
                                        <div class="d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/star.png')}}" alt="star" />
                                            </div>
                                            <span>4.5</span>
                                        </div>
                                        <div class="eye d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/eye.png')}}" alt="eye" />
                                            </div>
                                        
                                        </div>
                                        <div class="book d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/book.png')}}" alt="location" />
                                            </div>
                                            <span>{{$ic->lesson?$ic->lesson:0}} Lesson</span>
                                        </div>
                                        <div class="clock d-flex align-items-center">
                                            <div class="icon">
                                                <img src="{{asset('frontend/dist/images/icon/Clock.png')}}" alt="clock" />
                                            </div>
                                            <span>{{$ic->duration?$ic->duration:0}} Hours</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-xl-4 col-md-6">
                            <div class="contentCard contentCard--course">
                                <h3>No Courses Available</h3>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="{{route('searchCourse')}}" class="button button-lg button--primary">Browse all
                                Courses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="featured-popular-courses-shape">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-12.png')}}" alt="Shape"
            class="img-fluid dot-06" />
        <img src="{{asset('frontend/dist/images/shape/triangel.png')}}" alt="Shape" class="img-fluid dot-07" />
    </div>
</section>

{{-- Why You'll Learn With CourseX --}}
<section class="section feature section section--bg-offwhite-one">
    <div class="container">
        <h2 class="font-title--md text-center">Почему стоит учиться с CourseX</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-g">
                        <svg width="32" height="28" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 2H10.4C11.8852 2 13.3096 2.5619 14.3598 3.5621C15.41 4.56229 16 5.91885 16 7.33333V26C16 24.9391 15.5575 23.9217 14.7699 23.1716C13.9822 22.4214 12.9139 22 11.8 22H2V2Z"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M30 2H21.6C20.1148 2 18.6904 2.5619 17.6402 3.5621C16.59 4.56229 16 5.91885 16 7.33333V26C16 24.9391 16.4425 23.9217 17.2302 23.1716C18.0178 22.4214 19.0861 22 20.2 22H30V2Z"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h5 class="font-title--xs">Тысячи онлайн-курсов</h5>
                    <p>
                        Благодарим вас за проявленный интерес к нашей компании и добро пожаловать в нашу компанию. Здесь холодно, но так уютнее.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-b">
                        <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.3855 12.224C21.8743 12.224 23.8915 10.2067 23.8915 7.71794C23.8915 5.23054 21.8743 3.21191 19.3855 3.21191"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M21.4575 17.1211C22.201 17.1717 22.939 17.2783 23.6675 17.4395C24.6775 17.6404 25.8938 18.0546 26.3257 18.9607C26.6018 19.5415 26.6018 20.218 26.3257 20.7989C25.8952 21.705 24.6775 22.1191 23.6675 22.3269"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.5994 18.0913C15.6425 18.0913 19.9504 18.8553 19.9504 21.9071C19.9504 24.9604 15.6699 25.7503 10.5994 25.7503C5.55624 25.7503 1.24976 24.9877 1.24976 21.9345C1.24976 18.8813 5.52891 18.0913 10.5994 18.0913Z"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M10.5993 13.7349C7.27274 13.7349 4.60767 11.0684 4.60767 7.74188C4.60767 4.41669 7.27274 1.75024 10.5993 1.75024C13.9259 1.75024 16.5923 4.41669 16.5923 7.74188C16.5923 11.0684 13.9259 13.7349 10.5993 13.7349Z"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h5 class="font-title--xs">Опытные инструкторы</h5>
                    <p>
                        Учитесь у лучших! Наши опытные инструкторы делятся знаниями, практическими советами и проверенными методиками, чтобы вы достигали успеха быстрее.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="cardFeature">
                    <div class="cardFeature__icon cardFeature__icon--bg-r">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M25.2502 13.2495C25.2502 19.8774 19.8781 25.2495 13.2502 25.2495C6.62235 25.2495 1.25024 19.8774 1.25024 13.2495C1.25024 6.62162 6.62235 1.24951 13.2502 1.24951C19.8781 1.24951 25.2502 6.62162 25.2502 13.2495Z"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M17.7021 17.0667L12.8113 14.1491V7.86108" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <h5 class="font-title--xs">Пожизненный доступ</h5>
                    <p>
                        Занятия проходят свободно, с удобной организацией. Поддерживается комфортное обучение.Придерживается эффективного подхода.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--  Learning Rules Starts Here -->
<section class="section learning-rules">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-2 order-lg-0">
                <div class="learning-rules-starts">
                    <h2 class="font-title--md">
                        CourseX Простые <br class="d-none d-md-block" />
                        Этапы обучения
                    </h2>
                    <div class="learning-rules__wrapper">
                        <div class="learning-rules-item">
                            <div class="item-number"><span>01.</span></div>
                            <div class="item-text">
                                <h6>Создайте Свой Собственный Дом.</h6>
                                <p>
                                    Наши занятия построены так, чтобы обучение было удобным и эффективным. Каждый урок помогает легко усваивать материал и применять его на практике.
                                </p>
                            </div>
                        </div>
                        <div class="learning-rules-item">
                            <div class="item-number"><span>02.</span></div>
                            <div class="item-text">
                                <h6>Найдите лучший курс с более удобной фильтрацией</h6>
                                <p>
Наши занятия построены так, чтобы обучение было комфортным и продуктивным. Каждый урок помогает легко усваивать материал и применять знания на практике.
                                </p>
                            </div>
                        </div>
                        <div class="learning-rules-item">
                            <div class="item-number"><span>03.</span></div>
                            <div class="item-text">
                                <h6>И станьте мастером в своей области</h6>
                                <p>
                                    Наши занятия построены с учётом удобства и эффективности. Материал подаётся структурировано, чтобы вы легко усваивали новые знания и навыки.
                                </p>
                            </div>
                        </div>
                    </div>
                    <a href="searchCourse" class="button button-lg button--primary">Начать обучение</a>
                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-0">
                <div class="learning-rules-ends">
                    <img src="{{asset('frontend/dist/images/hero/hero-img-01.jpg')}}" alt="img"
                        class="img-fluid rounded"/>
                    <div class="learning-rules-ends-circle">
                        <img src="{{asset('frontend/dist/images/shape/l03.png')}}" alt="shape"
                            class="img-fluid" />
                    </div>
                    <div class="earning-rules-ends-shape">
                        <img src="{{asset('frontend/dist/images/shape/l04.png')}}" alt="shape"
                            class="img-fluid shape-1" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="learning-rules-shape">
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-16.png')}}" alt="shape"
            class="img-fluid shape-01" />
        <img src="{{asset('frontend/dist/images/shape/l02.png')}}" alt="shape" class="img-fluid shape-02" />
    </div>
</section>

<!--  About Services Starts Here -->
<section class="section about-services section section--bg-offgradient">
    <div class="container about-services-area">
        <div class="row">
            <div class="col-lg-6 text-center mx-auto">
                <h2 class="font-title--md">ЧТО НАШИ СТУДЕНТЫ ГОВОРЯТ О НАС</h2>
            </div>
        </div>
        <div class="testimonial testimonial--one testimonial__slider--one">
            <div class="testimonial__item">
                <p>
Давно искал курс, где можно не просто посмотреть лекции, а действительно понять, как всё работает на практике. Материал подаётся чётко и по делу — от базовых вещей до продвинутых тем.
Особенно понравилось, что преподаватель отвечает на вопросы - дополнительные советы, которые не найти в учебниках.
<div class="testimonial__user-wrapper d-flex justify-content-between">
                    <div class="testimonial__user d-flex align-items-center">
                        <div class="testimonial__user-img">
                            <img src="{{asset('https://cojo.ru/wp-content/uploads/2022/12/avy-dlia-patsanov-24.webp')}}" alt="Client" />
                        </div>
                        <div class="testimonial__user-info">
                            <h6>Кирилл</h6>
                            <!-- <span class="font-para--md">UI/UX Student</span> -->
                        </div>
                    </div>
                    <ul class="testimonial__item-star d-flex align-items-center">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="testimonial__item">
                <p>
Платформа понравилась — интерфейс простой, всё понятно с первого раза. Особенно круто, что после каждого модуля есть задания, которые помогают закрепить материал. Уже записалась на второй курс!                </p>
                <div class="testimonial__user-wrapper d-flex justify-content-between">
                    <div class="testimonial__user d-flex align-items-center">
                        <div class="testimonial__user-img">
                            <img src="{{asset('https://vjoy.cc/wp-content/uploads/2021/02/2f7147400505b7341a3d2f1b913f55b9747b06fe16cc3a14c05b0814a3c42b80.jpg')}}" alt="Client" />
                        </div>
                        <div class="testimonial__user-info">
                            <h6>Алена</h6>
                            <!-- <span class="font-para--md">UI/UX Student</span> -->
                        </div>
                    </div>
                    <ul class="testimonial__item-star d-flex align-items-center">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="testimonial__item">
                <p>
Курсы превзошли все ожидания! Очень удобно, что можно учиться в своём темпе, а преподаватель объясняет доступно и с примерами из реальной практики. Теперь чувствую себя гораздо увереннее в выбранной сфере!                </p>
                <div class="testimonial__user-wrapper d-flex justify-content-between">
                    <div class="testimonial__user d-flex align-items-center">
                        <div class="testimonial__user-img">
                            <img src="{{asset('https://vjoy.cc/wp-content/uploads/2021/02/230662-1566414011.jpg')}}" alt="Client" />
                        </div>
                        <div class="testimonial__user-info">
                            <h6>Екатерина</h6>
                            <!-- <span class="font-para--md">UI/UX Student</span> -->
                        </div>
                    </div>
                    <ul class="testimonial__item-star d-flex align-items-center">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-star">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="about-services-shape">
        <img src="{{asset('frontend/dist/images/shape/line02.png')}}" alt="shape"
            class="img-fluid img-shape-01" />
        <img src="{{asset('frontend/dist/images/shape/dots/dots-img-13.png')}}" alt="shape"
            class="img-fluid img-shape-02" />
        <img src="{{asset('frontend/dist/images/shape/l02.png')}}" alt="shape" class="img-fluid img-shape-03" />
    </div>
    <div class="container overflow-hidden">
        <div class="row mb-40">
            <div class="col-lg-6 mx-auto text-center brands-area-two-heading">
                <h4>
                    Более 30 000 школ и колледжей учатся вместе с нами.
                </h4>
                <p>
                    Продвигается систематическая структура, болезненная, без излишней мягкости. В верху сидит чистое соединение.
                </p>
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
</section>

<!-- Best Instructors Starts Here -->
<section class="section best-instructor-featured overflow-hidden main-instructor-featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 position-relative">
                <h3 class="text-center mb-40 font-title--md">ПОЗНАКОМЬТЕСЬ С НАШИМИ ЛУЧШИМИ</h3>
                <div class="ourinstructor__wrapper mt-lg-5 mt-0">
                    <div class="ourinstructor-active">
                        @forelse ($instructor as $i)
                        <div class="mentor">
                            <div class="mentor__img">
                                <img src="{{asset('uploads/users/'.$i->image)}}" alt="Mentor image" />
                            </div>
                            <div class="mentor__title">
                                <h6>
                                    <a href="{{route('instructorProfile', encryptor('encrypt', $i->id))}}"
                                        tabindex="0">{{$i->name_en}}</a>
                                </h6>
                                <p>{{$i->designation}}</p>
                            </div>
                        </div>
                        @empty
                        @endforelse
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

<!--  Latest Events Featured Starts Here -->
<section class="section section--bg-offwhite-three latest-events-featured main-events-featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="font-title--md">Последние события</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 position-relative px-0 mx-0">
                <div class="eventsSlider">
                    @forelse ($course as $c)
                    <div class="contentCard contentCard--event contentCard--space">
                        <div class="contentCard-top">
                            <a href="#"><img src="{{asset('uploads/courses/'.$c->image)}}" alt="images"
                                    class="img-fluid" /></a>
                        </div>
                        <div class="contentCard-bottom">
                            <h5>
                                <a href="{{route('courseDetails', encryptor('encrypt', $c->id))}}"
                                    class="font-title--card">{{$c->title_en}}</a>
                            </h5>
                            
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{route('searchCourse')}}" class="button button-lg button--primary mt-lg-5 mt-5">Просмотреть все события</a>
            </div>
        </div>
    </div>
    <div class="main-events-featured-shape">
        <img src="{{asset('frontend/dist/images/shape/triangel3.png')}}" alt="shape" class="img-fluid shape01" />
    </div>
</section>

<!--  Main Become Instructor Starts Here -->
<section class="section main-become-instructor">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="main-become-instructor-item me-12">
                    <div class="main-image">
                        <img src="{{asset('frontend/dist/images/event/image01.png')}}" alt="image"
                            class="img-fluid" />
                    </div>
                    <div class="main-text">
                        <h6 class="font-title--sm">СТАТЬ ПРЕПОДАВАТЕЛЕМ</h6>
                        <p>
                            Превратите свой опыт в источник вдохновения для тысяч учеников по всему миру.
                        </p>
                        <div class="text-center">
                           <a href="{{ route('become.instructor') }}" class="green-btn">Подать заявку на преподавателя</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-become-instructor-item ms-12 mb-0">
                    <div class="main-image">
                        <img src="{{asset('frontend/dist/images/event/image02.png')}}" alt="image"
                            class="img-fluid" />
                    </div>
                    <div class="main-text">
                        <h6 class="font-title--sm">ИСПОЛЬЗУЙТЕ CourseX ДЛЯ БИЗНЕСА</h6>
                        <p>
                           Решения для обучения сотрудников и роста вашей компании
                        </p>
                        <div class="text-center">
                            <a href="business" class="green-btn">Получите CourseX для бизнеса</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-become-instructor-shape">
        <img src="{{asset('frontend/dist/images/shape/line03.png')}}" alt="shape" class="img-fluid" />
    </div>
</section>

<!-- News Letter Starts Here -->
<section style="background-color: #ebebf2;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="newsletter-area">
                    <h4>Подпишитесь на нашу рассылку</h4>
                    <p class="mt-2 mb-lg-4 mb-3">
                        Узнавайте о новых курсах, скидках и возможностях для роста вместе с CourseX.
                    </p>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control border-lowBlack" placeholder="Ваша электронная почта" />
                            <button class="button button-lg button--primary" type="button">
                                Подписаться
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script>
    function drop() {
                    const dropBox = document.querySelector(".categoryDrop");
                    const arrow = document.querySelector(".select-button button svg");
                    arrow.classList.toggle("appear");
                    dropBox.classList.toggle("appear");
                }
</script>

@endpush