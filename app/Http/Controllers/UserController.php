<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return Redirect::back()->with('error', 'You cannot delete your user');
        }

        $user->delete();

        return Redirect::back()->with('success', 'User deleted');
    }
}
