@extends('frontend.layouts.app') {{-- если есть основной шаблон --}}

@section('content')
<div class="container mt-5 text-center">
    <h1 class="mb-4">Результаты поиска событий</h1>

    <p class="mb-4">События пока не найдены.</p>

    {{-- Изображение для пустого состояния --}}
    <img 
        src="https://static.wixstatic.com/media/155986_7cebb3ddac364f63a532e2c7d9b5f48e~mv2.gif" 
        alt="Нет событий" 
        style="max-width: 1400px; width: 110%; border-radius: 10px;"
    >
</div>
@endsection
