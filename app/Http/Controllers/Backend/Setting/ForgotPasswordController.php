<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // Показать форму
    public function showForm()
    {
        return view('backend.auth.forgot-password');
    }

    // Отправить email со ссылкой
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        // Генерируем токен
        $token = Str::random(60);

        // Сохраняем токен в таблице password_resets (создадим, если нет)
        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            ['token' => $token, 'created_at' => now()]
        );

        // Отправка email (можно заменить на свой шаблон)
        $link = url('admin/reset-password/' . $token);
        Mail::raw("Сброс пароля: $link", function($message) use ($request) {
            $message->to($request->email)
                    ->subject('Восстановление пароля');
        });

        return back()->with('status', 'Ссылка для восстановления пароля отправлена на email!');
    }

    // Форма для нового пароля
    public function showResetForm($token)
    {
        return view('backend.auth.reset-password', ['token' => $token]);
    }

    // Сброс пароля
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $record = DB::table('password_resets')->where('token', $request->token)->first();
        if (!$record) {
            return redirect()->route('password.request')->withErrors(['token' => 'Неверный или просроченный токен']);
        }

        $user = User::where('email', $record->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        DB::table('password_resets')->where('token', $request->token)->delete();

        return redirect()->route('login')->with('status', 'Пароль успешно сброшен!');
    }
}
