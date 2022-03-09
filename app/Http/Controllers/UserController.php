<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')
            ->paginate(5, ['id', 'name', 'email'])
            ->withQueryString()
            ->through(function ($user, $key) {
                $user['can_delete'] = Auth::id() != $user->id;

                return $user;
            });

        return Inertia::render('Users/Index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['string', 'required', 'max:255'],
            'email' => ['email', 'required', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'min:5']
        ]);

        User::create($data);

        return Redirect::route('dashboard.users.index')->with('success', 'User created');
    }

    public function edit(User $user)
    {
        return Inertia::render('Users/Edit', [
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return Redirect::back()->with('error', 'You cannot delete your user');
        }

        $user->delete();

        return Redirect::back()->with('success', 'User deleted');
    }
}
