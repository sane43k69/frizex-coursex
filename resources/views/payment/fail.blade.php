@extends('frontend.layouts.app')
@section('title', 'Оплата не удалась')

@section('content')
<div class="container py-5 text-center">
    <h2 class="text-danger">Оплата не удалась!</h2>
    <p>Произошла ошибка при оплате. Попробуйте снова или свяжитесь с поддержкой.</p>
    <a href="{{ route('checkout') }}" class="btn btn-warning mt-3">Попробовать снова</a>
</div>
@endsection
