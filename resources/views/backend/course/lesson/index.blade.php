@extends('backend.layouts.app')
@section('title', 'Список уроков курса')

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
                    <h4>Список уроков курса</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Главная страница</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('lesson.index')}}">Уроки курса</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('lesson.index')}}">Список уроков курса</a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">Просмотр списка</a></li>
                    <li class="nav-item"><a href="javascript:void(0);" data-toggle="tab"
                            class="nav-link btn-primary">Просмотр 
                            сетки</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Список всех уроков курса </h4>
                                <a href="{{route('lesson.create')}}" class="btn btn-primary">+ Добавить новый</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('#')}}</th>
                                                <th>{{__('Название')}}</th>
                                                <th>{{__('Курс')}}</th>
                                                <th>{{__('Действие')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($lesson as $l)
                                            <tr>
                                                <td>{{$l->id}}</td>
                                                <td>{{$l->title}}</td>
                                                <td>{{$l->course?->title_en}}</td>
                                                <td>
                                                    <a href="{{route('lesson.edit', encryptor('encrypt',$l->id))}}"
                                                        class="btn btn-sm btn-primary" title="Edit"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Delete" onclick="$('#form{{$l->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$l->id}}"
                                                        action="{{route('lesson.destroy', encryptor('encrypt',$l->id))}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="6" class="text-center">Урок курса не найден</th>
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