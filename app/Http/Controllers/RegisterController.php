<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'mac' => ['required', 'max:50'],
            'phone' => ['required', 'max:13'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => 'required|min:5',
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        if (User::where('phone', $attributes['phone'])->exists()) {
            return redirect()->back()->with(['error' => 'The phone number has already been taken.']);
        }

        $isEmpty = User::count() === 0;
    
        $attributes['setStatus'] = $isEmpty ? 1 : 0;
        $attributes['setLevel'] = $isEmpty ? 1 : 0;

        session()->flash('success', 'Your account has been created.');
        $user = User::create($attributes);
        return redirect()->back();
    }
}
