@extends('backend.layouts.app')
@section('title', 'Admin Dashboard')

@push('styles')
<link rel="stylesheet" href="{{asset('vendor/jqvmap/css/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('css/skin-2.css')}}">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Всего студентов</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 422</h5>
                    </div>
                    <div class="card-body text-center mt-3">
                        <div class="ico-sparkline">
                            <div id="sparkline12"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-success overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Новые студенты</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 357</h5>
                    </div>
                    <div class="card-body text-center mt-4 p-0">
                        <div class="ico-sparkline">
                            <div id="spark-bar-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Общий курс</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 547</h5>
                    </div>
                    <div class="card-body p-0 mt-2">
                        <div class="px-4"><span class="bar1"
                                data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Взимание сборов</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 3280$</h5>
                    </div>
                    <div class="card-body p-0 mt-1">
                        <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Отчет о доходах и расходах</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart_2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Отчет о доходах и расходах</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="areaChart_1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Назначить задачу</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Задача</th>
                                        <th scope="col">Назначенные профессора</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Прогресс</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Отчет о рабочем проекте</td>
                                        <td>Герман Бек</td>
                                        <td><span class="badge badge-rounded badge-primary">сделано</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                    <span class="sr-only">Выполнено на 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Отчет о сборе платежей</td>
                                        <td>Эмма Уотсон</td>
                                        <td><span class="badge badge-rounded badge-warning">Подгибание</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Выполнено на 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Управленческий отчет</td>
                                        <td>Мэри Адамс</td>
                                        <td><span class="badge badge-rounded badge-warning">Подгибание</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Выполнено на 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>Статус библиотечной книги</td>
                                        <td>Калеб Ричардс</td>
                                        <td><span class="badge badge-rounded badge-danger">Подвешенный</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Выполнено на 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td>Статус размещения</td>
                                        <td>Июнь</td>
                                        <td><span class="badge badge-rounded badge-warning">Подгибание</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Выполнено на 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <td>Отчет о рабочем проекте</td>
                                        <td>Герман Бек</td>
                                        <td><span class="badge badge-rounded badge-primary">сделано</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                    <span class="sr-only">Выполнено на 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Уведомления</h4>
                    </div>
                    <div class="card-body">
                        <div class="widget-todo dz-scroll" style="height:370px;" id="DZ_W_Notifications">
                            <ul class="timeline">
                                <li>
                                    <div class="timeline-badge primary"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic1.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Доктор Султадс присылает вам фотографию</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic2.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Перенос создан успешно</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic3.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Напоминаю: Время процедуры!</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic4.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Доктор Султадс присылает вам фотографию</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic5.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Перенос создан успешно</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic6.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Напоминаю: Время процедуры!</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge info"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic7.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Доктор Султадс присылает вам фотографию</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge danger"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic8.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Перенос создан успешно</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic9.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Напоминаю: Время процедуры!</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning"></div>
                                    <a class="timeline-panel text-muted d-flex align-items-center"
                                        href="javascript:void(0);">
                                        <img class="rounded-circle" alt="image" width="50"
                                            src="{{asset('images/profile/education/pic10.jpg')}}">
                                        <div class="col">
                                            <h5 class="mb-1">Доктор Султадс присылает вам фотографию</h5>
                                            <small class="d-block">29 Июля 2020 - 02:26</small>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Новый список студентов </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="px-5 py-3">Имя</th>
                                        <th class="py-3">Назначенный профессор</th>
                                        <th class="py-3">Ветка</th>
                                        <th class="py-3">Статус</th>
                                        <th class="py-3">Дата Поступления</th>
                                        <th class="py-3">Редактировать</th>
                                    </tr>
                                </thead>
                                <tbody id="customers">
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/5.png')}}" width="30"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Рикки Энтони</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Герман Бек</td>
                                        <td class="py-2">Механический</td>
                                        <td><span class="badge badge-rounded badge-primary">сделано</span></td>
                                        <td class="py-2">30/03/2018</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/1.png')}}" alt=""
                                                            width="30">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Эмма Уотсон</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Эмма Уотсон</td>
                                        <td class="py-2">Компьютер</td>
                                        <td><span class="badge badge-rounded badge-warning">Подгибание</span></td>
                                        <td class="py-2">11/07/2017</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/5.png')}}" width="30"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Роуэн Аткинсон</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Роуэн Аткинсон</td>
                                        <td class="py-2">Механический</td>
                                        <td><span class="badge badge-rounded badge-primary">сделано</span></td>
                                        <td class="py-2">05/04/2016</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/1.png')}}" alt=""
                                                            width="30">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Энтони Хопкинс</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Калеб Ричардс </td>
                                        <td class="py-2">Компьютер </td>
                                        <td><span class="badge badge-rounded badge-danger">Подвешенный</span></td>
                                        <td class="py-2">05/04/2018</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/1.png')}}" alt=""
                                                            width="30">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Дженнифер Шрамм</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Июньский переулок</td>
                                        <td class="py-2">Взимание сборов</td>
                                        <td><span class="badge badge-rounded badge-warning">Подгибание</span></td>
                                        <td class="py-2">17/03/2016</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/5.png')}}" width="30"
                                                            alt="">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Рэймонд Мимс</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Герман Бек</td>
                                        <td class="py-2">Компьютер</td>
                                        <td><span class="badge badge-rounded badge-danger">Подвешенный</span></td>
                                        <td class="py-2">12/07/2014</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="btn-reveal-trigger">
                                        <td class="p-3">
                                            <a href="javascript:void(0);">
                                                <div class="media d-flex align-items-center">
                                                    <div class="avatar avatar-xl mr-2">
                                                        <img class="rounded-circle img-fluid"
                                                            src="{{asset('images/avatar/1.png')}}" alt=""
                                                            width="30">
                                                    </div>
                                                    <div class="media-body">
                                                        <h5 class="mb-0 fs--1">Майкл Дженкинс</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Дженнифер Шрамм</td>
                                        <td class="py-2">Механический</td>
                                        <td><span class="badge badge-rounded badge-warning">Пандинг</span></td>
                                        <td class="py-2">15/06/2014</td>
                                        <td>
                                            <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                    class="la la-pencil"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                    class="la la-trash-o"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<!-- Chart ChartJS plugin files -->
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Chart sparkline plugin files -->
<script src="{{asset('vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Demo scripts -->
<script src="{{asset('js/dashboard/dashboard-3.js')}}"></script>
@endpush