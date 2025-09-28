<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showCard()
    {
        return view('pages.pay_card');
    }

    public function showSbp()
    {
        return view('pages.pay_sbp');
    }

    public function createPayment(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'integer', 'min:10'],
            'description' => ['nullable', 'string', 'max:255'],
            'payment_method' => ['required', 'in:card,sbp'],
        ]);

        $user = Auth::user();
        $amount = $validated['amount'];

        $user->update(['balance' => $user->balance + $amount]);

        return redirect()->route('account')->with(
            'success',
            "Платеж успешно обработан! Ваш баланс пополнен на {$amount} руб."
        );
    }

    public function paymentSuccess(Request $request)
    {
        return redirect()->route('account')->with(
            'success',
            "Платеж успешно обработан!"
        );
    }

    public function paymentCancel()
    {
        return redirect()->route('account')->withErrors([
            'payment' => 'Платеж отменен'
        ]);
    }

    public function webhook(Request $request)
    {
        return response()->json(['status' => 'success'], 200);
    }

    public function checkStatus(Request $request)
    {
        return response()->json(['status' => 'succeeded'], 200);
    }
}
