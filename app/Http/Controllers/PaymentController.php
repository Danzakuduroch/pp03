<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}


