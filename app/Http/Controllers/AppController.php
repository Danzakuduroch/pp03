<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        return redirect()->route("promotions");
    }

    public function aboutShow() {
        return view("pages.about");
    }

    public function promotionsShow() {
        $promotions = Promotion::all();

        return view("pages.promotions", compact("promotions"));
    }

    public function accountShow() {
        return view("pages.account");
    }
}
