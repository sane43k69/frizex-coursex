@extends('frontend.layouts.app')
@section('title', 'Карьера')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
<!-- Breadcrumb -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/" class="fs-6 text-secondary">Главная страница</a></li>
                <li class="breadcrumb-item active"><a href="career" class="fs-6 text-secondary">Карьера</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Open Positions -->
<section id="openings" class="career-openings section py-5">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-lg-12">
                <h2 class="font-title--md mb-2" style="background: linear-gradient(135deg, #0d6efd, #6610f2); -webkit-background-clip: text; color: transparent;">Открытые вакансии</h2>
                <p class="text-secondary fs-5">Фильтруйте вакансии и найдите идеальную позицию для себя.</p>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                @php
                    $departments = ['Все','Разработка','Дизайн','Маркетинг','Продажи','Поддержка'];
                    $deptColors = [
                        'Разработка'=>'linear-gradient(135deg, #0d6efd, #6610f2)',
                        'Дизайн'=>'linear-gradient(135deg, #6f42c1, #d63384)',
                        'Маркетинг'=>'linear-gradient(135deg, #198754, #20c997)',
                        'Продажи'=>'linear-gradient(135deg, #fd7e14, #ffc107)',
                        'Поддержка'=>'linear-gradient(135deg, #dc3545, #fd395c)'
                    ];

                    // Инициализация вакансий
                    $jobs = [
                        ['title'=>'Frontend Developer','department'=>'Разработка','location'=>'Алматы','type'=>'Полная занятость','desc'=>'Работа с современными фронтенд-технологиями, участие в проектах компании.'],
                        ['title'=>'UX/UI Designer','department'=>'Дизайн','location'=>'Нур-Султан','type'=>'Частичная занятость','desc'=>'Проектирование интерфейсов и улучшение пользовательского опыта.'],
                        ['title'=>'Marketing Specialist','department'=>'Маркетинг','location'=>'Онлайн','type'=>'Удалённая работа','desc'=>'Разработка стратегий продвижения и анализ маркетинговых кампаний.'],
                        ['title'=>'Customer Support','department'=>'Поддержка','location'=>'Алматы','type'=>'Полная занятость','desc'=>'Обеспечение качественной поддержки клиентов и взаимодействие с командой.'],
                        ['title'=>'Sales Manager','department'=>'Продажи','location'=>'Нур-Султан','type'=>'Полная занятость','desc'=>'Продажи продуктов компании, взаимодействие с клиентами, выполнение KPI.'],
                    ];
                @endphp

                <div class="d-flex justify-content-center flex-wrap gap-3 mb-4">
                    @foreach($departments as $dept)
                        <button class="btn dept-filter fw-semibold px-4 py-2 rounded-pill shadow-sm">{{ $dept }}</button>
                    @endforeach
                </div>
                <input type="text" id="job-search" placeholder="Поиск по должности..." class="form-control form-control-lg w-50 mx-auto search-input shadow-sm">
            </div>
        </div>

        <!-- Jobs List -->
        <div class="row g-4" id="job-list">
            @foreach($jobs as $job)
            <div class="col-lg-6 col-md-12 job-item" data-department="{{ $job['department'] }}">
                <div class="card job-card shadow-lg position-relative overflow-hidden border-0 p-4">
                    <div class="job-label" style="background: {{ $deptColors[$job['department']] ?? '#6c757d' }}">{{ $job['department'] }}</div>
                    <div class="card-body pt-5">
                        <h5 class="card-title fw-bold">{{ $job['title'] }}</h5>
                        <p class="text-secondary mb-1"><i class="fas fa-map-marker-alt me-2"></i>{{ $job['location'] }}</p>
                        <p class="text-secondary mb-2"><i class="fas fa-clock me-2"></i>{{ $job['type'] }}</p>
                        <p class="text-secondary mb-3 job-desc">{{ $job['desc'] }}</p>
                        <a href="mailto:hr@elearning.com?subject=Резюме на {{ $job['title'] }}" class="btn btn-gradient btn-apply">
                            <i class="fas fa-paper-plane me-2"></i> Отправить резюме
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('scripts')
<style>
/* Карточки вакансий */
.job-card {
    border-radius: 20px;
    background: #fff;
    transition: transform 0.5s, box-shadow 0.5s;
}
.job-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

/* Метка отдела */
.job-label {
    position: absolute;
    top:0; left:0;
    padding:8px 18px;
    font-size:0.75rem;
    font-weight:700;
    color:#fff;
    text-transform: uppercase;
    border-bottom-right-radius:15px;
}

/* Контент карточки */
.job-card .card-body { padding-top: 50px; }
.job-desc { font-size:0.95rem; line-height:1.5; color:#495057; }

/* Анимация появления */
.job-item { opacity:0; transform:translateY(40px); transition: all 0.7s ease-out; }
.job-item.visible { opacity:1; transform:translateY(0); }

/* Кнопка */
.btn-apply {
    border-radius:50px;
    padding:10px 25px;
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    color:#fff;
    font-weight:600;
    transition: all 0.3s;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.btn-apply:hover {
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

/* Фильтр кнопок */
.dept-filter {
    cursor: pointer;
    background:#fff;
    color:#333;
    border:1px solid #ddd;
    transition: all 0.3s;
}
.dept-filter:hover {
    color:#fff;
    background: linear-gradient(135deg, #0d6efd, #6610f2);
    transform: scale(1.05);
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
}

/* Поисковая строка */
.search-input:focus {
    border-color:#6610f2;
    box-shadow: 0 0 0 0.2rem rgba(102,16,242,0.25);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const filterBtns = document.querySelectorAll('.dept-filter');
    const jobItems = document.querySelectorAll('.job-item');

    // Фильтр
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const dept = this.textContent.trim();
            jobItems.forEach(item => {
                if(dept==='Все'||item.dataset.department===dept){
                    item.style.display='block';
                    setTimeout(()=>item.classList.add('visible'),50);
                } else {
                    item.style.display='none';
                    item.classList.remove('visible');
                }
            });
        });
    });

    // Поиск
    document.getElementById('job-search').addEventListener('input', function() {
        const query=this.value.toLowerCase();
        jobItems.forEach(item=>{
            const title=item.querySelector('.card-title').textContent.toLowerCase();
            if(title.includes(query)){
                item.style.display='block';
                setTimeout(()=>item.classList.add('visible'),50);
            } else {
                item.style.display='none';
                item.classList.remove('visible');
            }
        });
    });

    // Появление при скролле
    const observer=new IntersectionObserver(entries=>{
        entries.forEach(entry=>{
            if(entry.isIntersecting){ entry.target.classList.add('visible'); }
        });
    }, { threshold:0.2 });
    jobItems.forEach(item=>observer.observe(item));
});
</script>
@endpush
