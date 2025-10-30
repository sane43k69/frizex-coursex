@extends('frontend.layouts.app')

@section('title', 'Стать преподавателем')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center">Стать преподавателем</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($existing && $existing->status == 'pending')
        <div class="alert alert-info text-center">
            У вас уже есть заявка, отправленная {{ $existing->created_at->format('d.m.Y') }}.<br>
            Статус: <strong>{{ ucfirst($existing->status) }}</strong>
        </div>
    @endif

    <form action="{{ route('instructor.apply.store') }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width:700px;">
        @csrf
        <div class="mb-3">
            <label class="form-label">О себе (биография)</label>
            <textarea name="bio" class="form-control" rows="5" required>{{ old('bio') }}</textarea>
            @error('bio')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Телефон (необязательно)</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Ссылка на портфолио (необязательно)</label>
                <input type="url" name="portfolio_url" class="form-control" value="{{ old('portfolio_url') }}">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Документ (резюме, pdf/doc)</label>
            <input type="file" name="document" class="form-control">
        </div>

        <button class="btn btn-primary w-100" type="submit">Отправить заявку</button>
    </form>
</div>
@endsection
