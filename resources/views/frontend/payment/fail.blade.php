@extends('frontend.layouts.app')
@section('title', 'Оплата не прошла')

@section('content')
<div class="payment-fail-page" style="min-height: 80vh; display:flex; justify-content:center; align-items:center; background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%); padding: 50px 0;">
    <div class="card text-center shadow-lg" style="background: white; border-radius: 20px; padding: 50px 30px; max-width: 500px; width: 90%; position: relative; overflow: hidden;">
        
        <!-- Крестик -->
        <div style="width: 100px; height: 100px; margin: 0 auto 20px; border-radius: 50%; background: #dc3545; display:flex; align-items:center; justify-content:center; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-x" viewBox="0 0 16 16">
                <path d="M4.646 4.646a.5.5 0 1 1 .708-.708L8 6.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 7l2.647 2.646a.5.5 0 0 1-.708.708L8 7.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 7 4.646 4.354z"/>
            </svg>
        </div>

        <h1 style="font-size: 2.2rem; font-weight: 700; color: #dc3545; margin-bottom: 15px;">Оплата не прошла!</h1>
        <p style="font-size: 1.1rem; color: #6c757d; margin-bottom: 30px;">Что-то пошло не так. Попробуйте ещё раз или свяжитесь с поддержкой.</p>
        <a href="{{ url('/') }}" class="btn btn-lg btn-danger" style="padding: 12px 40px; font-size: 1.1rem; border-radius: 50px;">Вернуться на главную</a>
    </div>
</div>

<style>
/* Карточка появление */
.card {
    transform: scale(0.8);
    opacity: 0;
    animation: popCard 0.6s forwards ease-out;
}
@keyframes popCard {
    to {
        transform: scale(1);
        opacity: 1;
    }
}
</style>
@endsection
