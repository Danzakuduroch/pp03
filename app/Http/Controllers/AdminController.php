<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $promotionsCount = Promotion::count();
        $usersCount = User::count();
        return view('admin.dashboard', compact('promotionsCount', 'usersCount'));
    }

    public function promotionsIndex()
    {
        $promotions = Promotion::latest()->get();
        return view('admin.promotions.index', compact('promotions'));
    }

    public function promotionsCreate()
    {
        return view('admin.promotions.form');
    }

    public function promotionsStore(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],
        ]);
        Promotion::create($validated);
        return redirect()->route('admin.promotions.index');
    }

    public function promotionsEdit(Promotion $promotion)
    {
        return view('admin.promotions.form', compact('promotion'));
    }

    public function promotionsUpdate(Request $request, Promotion $promotion)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image' => ['required', 'string'],
        ]);
        $promotion->update($validated);
        return redirect()->route('admin.promotions.index');
    }

    public function promotionsDestroy(Promotion $promotion)
    {
        $promotion->delete();
        return redirect()->route('admin.promotions.index');
    }

    public function usersIndex()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function usersCreate()
    {
        return view('admin.users.form');
    }

    public function usersStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ]);
        User::create($validated);
        return redirect()->route('admin.users.index');
    }

    public function usersEdit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function usersUpdate(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:6'],
        ]);

        if (empty($validated['password'])) {
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('admin.users.index');
    }

    public function usersDestroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}


