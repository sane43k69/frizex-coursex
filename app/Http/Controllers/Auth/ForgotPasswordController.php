<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('backend.auth.forgot-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        $link = url('/admin/reset-password/' . $token);

        // Отправка письма
        Mail::send('emails.reset-password', ['link' => $link], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Сброс пароля');
        });

        return back()->with('status', 'Ссылка для сброса пароля отправлена на email.');
    }
}
