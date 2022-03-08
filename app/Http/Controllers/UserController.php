<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')
            ->paginate(5, ['id', 'name', 'email'])
            ->withQueryString()
            ->through(function ($user, $key) {
                $user['can_delete'] = true;

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
