<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstructorApplication;
use Illuminate\Support\Facades\Auth;

class InstructorApplicationController extends Controller
{
    /**
     * Показать страницу подачи заявки.
     */
    public function create()
    {
        return view('frontend.become-instructor');
    }

    /**
     * Обработка формы заявки.
     */
    public function store(Request $request)
    {
        // Валидация данных формы
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:2000',
            'portfolio_url' => 'nullable|url',
            'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Если пользователь не авторизован — просто показываем успех без записи в БД
        if (!Auth::check()) {
            return back()->with('success', 'Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.');
        }

        // Сохраняем документ, если он загружен
        $path = null;
        if ($request->hasFile('document')) {
            $path = $request->file('document')->store('documents', 'public');
        }

        // Сохраняем заявку в базу
        InstructorApplication::create([
            'user_id' => Auth::id(),
            'phone' => $request->phone,
            'bio' => $request->bio,
            'portfolio_url' => $request->portfolio_url,
            'document_path' => $path,
        ]);

        // Возвращаем сообщение об успехе
        return back()->with('success', 'Ваша заявка успешно отправлена! Спасибо, что хотите стать преподавателем на CourseX.');
    }
}
