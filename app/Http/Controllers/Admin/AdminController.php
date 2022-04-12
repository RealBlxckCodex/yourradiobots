<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function loginAsUser(User $user)
    {
        session()->put('admin_id', Auth::user()->id);
        Auth::loginUsingId($user->id);
        toast()->success("Du wurdest als Benutzer " . $user->name . " eingeloggt.");
        return redirect(route('dashboard'));
    }

}