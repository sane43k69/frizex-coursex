@extends('frontend.layouts.app')
@section('title', 'Оплата успешна')

@section('content')
<div class="payment-success-page" style="min-height: 80vh; display:flex; justify-content:center; align-items:center; background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); padding: 50px 0;">
    <div class="card text-center shadow-lg" style="background: white; border-radius: 20px; padding: 50px 30px; max-width: 500px; width: 90%; position: relative; overflow: hidden;">
        
        <!-- Конфетти -->
        <div class="confetti"></div>

        <!-- Галочка -->
        <div style="width: 100px; height: 100px; margin: 0 auto 20px; border-radius: 50%; background: #28a745; display:flex; align-items:center; justify-content:center; box-shadow: 0 0 20px rgba(0,0,0,0.1);">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 1 0-.708.708L6.5 11l-3.146-3.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7z"/>
            </svg>
        </div>

        <h1 style="font-size: 2.2rem; font-weight: 700; color: #28a745; margin-bottom: 15px;">Оплата успешна!</h1>
        <p style="font-size: 1.1rem; color: #6c757d; margin-bottom: 30px;">Спасибо за покупку. Ваши курсы теперь доступны и готовы к изучению.</p>
        <a href="{{ url('/') }}" class="btn btn-lg btn-success" style="padding: 12px 40px; font-size: 1.1rem; border-radius: 50px;">Вернуться на главную</a>
    </div>
</div>

<style>
/* Confetti */
@keyframes confetti-fall {
    0% { transform: translateY(0) rotate(0deg); opacity:1;}
    100% { transform: translateY(600px) rotate(360deg); opacity:0;}
}
.confetti {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
    overflow: hidden;
}
.confetti::before, .confetti::after {
    content: '';
    position: absolute;
    width: 10px; height: 10px;
    background: #ffc107;
    top: -10px;
    left: 50%;
    animation: confetti-fall 2s infinite ease-in;
}
.confetti::after {
    background: #28a745;
    left: 30%;
    animation-delay: 0.5s;
}

/* Card pop animation */
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
