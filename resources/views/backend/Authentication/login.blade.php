@extends('backend.layouts.appAuth')
@section('title', 'Вход')

@section('content')

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">Войдите в свой аккаунт</h4>
                                <form action="{{route('login.check')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>Электронная почта или телефон</strong></label>
                                        <input type="text" class="form-control" value="{{old('username')}}"
                                            name="username" id="username">
                                        @if($errors->has('username'))
                                        <small class="d-block text-danger">{{$errors->first('username')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Пароль</strong></label>
                                        <input type="password" class="form-control" value="{{old('password')}}"
                                            name="password" id="password">
                                        @if($errors->has('password'))
                                        <small class="d-block text-danger">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox ml-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="basic_checkbox_1">
                                                <label class="custom-control-label" for="basic_checkbox_1">Запомнить
                                                    данные</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="{{ route('password.request') }}">Забыли пароль?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection