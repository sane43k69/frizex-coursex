@extends('backend.layouts.app')
@section('title', 'Список зачисленных')

@push('styles')
<!-- Datatable -->
<link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Зачисленные</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Главная страница</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('enrollment.index')}}">Зачисления</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('enrollment.index')}}">Все записи</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Список всех зарегистрированных участников </h4>
                                <a href="{{route('enrollment.create')}}" class="btn btn-primary">+ Добавить новый</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('#')}}</th>
                                                <th>{{__('Имя студента')}}</th>
                                                <th>{{__('Название курса')}}</th>
                                                <th>{{__('Изображение курса')}}</th>
                                                <th>{{__('Стоимость курса')}}</th>
                                                <th>{{__('Дата зачисления')}}</th>
                                                <th>{{__('Действие')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($enrollment as $e)
                                            <tr>
                                                <td><img class="rounded-circle" width="35" height="35"
                                                        src="{{asset('uploads/students/'.$e->student?->image)}}"
                                                        alt="">
                                                </td>
                                                <td><strong>{{$e->student?->name_en}}</strong></td>
                                                <td><strong>{{$e->course?->title_en}}</strong></td>
                                                <td><img class="img fluid" width="100"
                                                        src="{{asset('uploads/courses/'.$e->course?->image)}}"
                                                        alt="">
                                                </td>
                                                <td><strong>{{$e->course?->price==null?'Free':'₸'.$e->course?->price}}</strong></td>
                                                <td><strong>{{$e->enrollment_date}}</strong></td>
                                                <td>
                                                    <a href="{{route('enrollment.edit', encryptor('encrypt',$e->id))}}"
                                                        class="btn btn-sm btn-primary" title="Edit"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Delete" onclick="$('#form{{$e->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$e->id}}"
                                                        action="{{route('enrollment.destroy', encryptor('encrypt',$e->id))}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="6" class="text-center">Не найдено записей о зачислении</th>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

@endpush