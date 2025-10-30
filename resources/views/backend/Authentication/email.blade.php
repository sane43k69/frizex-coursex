@extends('backend.layouts.appAuth')
@section('title', 'Восстановление пароля')

@section('content')
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">Восстановление пароля</h4>

                                @if(session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>
                                @endif

                                <form action="{{ route('admin.password.email') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>Электронная почта</strong></label>
                                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger d-block">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Отправить ссылку для сброса
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-3">
                                    <a href="{{ route('login') }}">Назад к входу</a>
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
