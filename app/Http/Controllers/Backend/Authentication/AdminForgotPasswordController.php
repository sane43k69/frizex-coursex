<?php

namespace App\Http\Controllers\Backend\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminForgotPasswordController extends Controller
{
    public function showRequestForm()
    {
        return view('backend.Authentication.email'); // твой Blade
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Просто показываем сообщение, что письмо отправлено, без проверки
        return back()->with('status', 'Если пользователь с таким email существует, письмо для восстановления пароля отправлено.');
    }
}
