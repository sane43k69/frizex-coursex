@extends('frontend.layouts.app')
@section('title', 'Стать преподавателем')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #f3f4f6, #ffffff);">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-dark mb-3">Подайте заявку на преподавателя</h1>
            <p class="text-muted fs-5">
                Расскажите о себе — и, возможно, вы станете частью нашей команды преподавателей!
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                    <h4 class="fw-semibold mb-4 text-center text-primary">Форма подачи заявки</h4>

                    <form action="{{ route('become.instructor.store') }}" method="POST" enctype="multipart/form-data" class="animate-fade-in">
                        @csrf

                        <div class="mb-4">
                            <label for="phone" class="form-label fw-semibold">Номер телефона</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-lg rounded-3"
                                   placeholder="+7 (___) ___-__-__" required>
                        </div>

                        <div class="mb-4">
                            <label for="bio" class="form-label fw-semibold">Кратко о себе</label>
                            <textarea name="bio" id="bio" rows="4"
                                      class="form-control form-control-lg rounded-3"
                                      placeholder="Ваш опыт, специализация и почему хотите преподавать" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="portfolio_url" class="form-label fw-semibold">Портфолио / Личный сайт (необязательно)</label>
                            <input type="url" name="portfolio_url" id="portfolio_url"
                                   class="form-control form-control-lg rounded-3"
                                   placeholder="https://пример.com">
                        </div>

                        <div class="mb-4">
                            <label for="document" class="form-label fw-semibold">Загрузите резюме или документ (PDF, DOC, DOCX)</label>
                            <input type="file" name="document" id="document"
                                   class="form-control form-control-lg rounded-3"
                                   accept=".pdf,.doc,.docx">
                        </div>

                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-success btn-lg px-5 py-3 rounded-4 shadow-sm hover-raise">
                                Отправить заявку
                            </button>
                            <p class="text-muted mt-3 small">
                                После отправки заявки мы свяжемся с вами по указанной почте.
                            </p>
                        </div>
                    </form>
                </div>

                <div class="text-center mt-5">
                    <a href="/" class="text-decoration-none text-secondary hover-underline">← Вернуться на главную</a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hover-underline:hover {
        text-decoration: underline;
    }
    .hover-raise {
        transition: all 0.3s ease;
    }
    .hover-raise:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(25, 135, 84, 0.25);
    }
    .animate-fade-in {
        animation: fadeIn 0.8s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection
