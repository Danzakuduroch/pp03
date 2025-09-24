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

    public function reviewStore(Request $request) {

        $validated = $request->validate([
            'text' => ['required', 'string', 'max:1000'],
        ]);

        $user = Auth::user();

        Review::create([
            'name' => $user->name,
            'text' => $validated['text'],
            'avatar' => '/assets/images/logo.png',
            'user_id' => $user->id,
        ]);

        return redirect()->route('about');
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
