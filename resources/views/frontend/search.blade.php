@extends('frontend.layouts.app')
@section('title', 'Результаты поиска')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">
        Результаты поиска: <span class="text-primary">"{{ $query }}"</span>
    </h3>

    @if($courses->count() > 0)
        <div class="row">
            @foreach($courses as $c)
                <div class="col-md-4 mb-4">
                    <div class="contentCard shadow-sm p-3 rounded-3">
                        <img src="{{ asset('uploads/courses/' . $c->image) }}" class="img-fluid rounded mb-3" alt="{{ $c->title_en }}">
                        <h5><a href="{{ route('courseDetails', ['id' => encryptor('encrypt', $c->id)]) }}" class="text-dark">{{ $c->title_en }}</a></h5>
                        <p class="text-muted small">{{ Str::limit($c->description_en, 80) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-primary">{{ $c->price ? '₸'.$c->price : 'Бесплатно' }}</span>
                            <span class="text-muted">{{ $c->duration }} ч</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $courses->appends(['q' => $query])->links() }}
        </div>
    @else
        <p>По вашему запросу ничего не найдено.</p>
    @endif
</div>
@endsection
