<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Проверка авторизации студента через сессию
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!session()->has('studentLogin')) {
                return redirect()->route('studentLogin'); // редирект на страницу логина студента
            }
            return $next($request);
        });
    }

    /**
     * Страница оформления заказа
     */
    public function checkout()
    {
        $cart = session('cart', []);
        $cartDetails = session('cart_details', []);
        return view('frontend.checkout', compact('cart', 'cartDetails'));
    }

    /**
     * Обработка платежа
     */
    public function processPayment(Request $request)
    {
        $amount = session('cart_details')['total_amount'] ?? 0;

        // Получаем студента из сессии
        $studentId = encryptor('decrypt', session('userId'));
        $student = Student::find($studentId);

        // Интеграция с платёжной системой
        $paymentSuccess = $this->yourPaymentGateway($amount, $student);

        if ($paymentSuccess) {
            // Сохраняем оплату в базе
            Payment::create([
                'user_id' => $student->id,
                'amount' => $amount,
                'status' => 'paid',
            ]);

            // Очищаем корзину
            session()->forget('cart');
            session()->forget('cart_details');

            return redirect()->route('payment.success');
        } else {
            return redirect()->route('payment.fail');
        }
    }

    /**
     * Страница успешной оплаты
     */
    public function success()
    {
        return view('frontend.payment.success');
    }

    /**
     * Страница неудачной оплаты
     */
    public function fail()
    {
        return view('frontend.payment.fail');
    }

    /**
     * Метод интеграции с платёжной системой
     */
    private function yourPaymentGateway($amount, $student)
    {
        $mid = env('PAYMENT_MID');
        $api = env('PAYMENT_API');
        $secret = env('PAYMENT_SECRET');
        $sid = env('PAYMENT_SID');
        $url = 'https://api.getpayments.tech/pay';

        $payload = [
            'mid' => $mid,
            'api_key' => $api,
            'secret' => $secret,
            'sid' => $sid,
            'amount' => $amount,
            'customer_name' => $student ? $student->name_en : 'Guest',
            'customer_email' => $student ? $student->email : 'guest@example.com',
            'order_id' => uniqid(),
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            $res = json_decode($response, true);
            return isset($res['status']) && $res['status'] === 'success';
        }

        return false;
    }
}
