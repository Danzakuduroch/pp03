<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index() {
        return redirect()->route("promotions");
    }

    public function aboutShow() {
        $reviews = Review::all();

        return view("pages.about", compact("reviews"));
    }

    public function promotionsShow() {
        $promotions = Promotion::all();

        return view("pages.promotions", compact("promotions"));
    }

    public function accountShow() {
        $user = Auth::user() ?? User::first();

        return view("pages.account", compact("user"));
    }
}
