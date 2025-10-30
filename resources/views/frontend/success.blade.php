@extends('frontend.layouts.app')
@section('title', 'Оплата успешна')

@section('content')
<div class="container py-5 text-center">
    <h2 class="text-success">Оплата прошла успешно!</h2>
    <p>Спасибо за покупку. Ваши курсы теперь доступны.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Вернуться на главную</a>
</div>
@endsection
