<?php


namespace App\Http\Controllers;


use App\Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function deleteSession($session_id)
    {
        $session = Session::all()->where('id', $session_id)->first();
        if($session == null) return back();
        if (!($session->user_id == Auth::user()->id)) return back();
        $session->delete();
        return $this->returnSuccess('Die Session wurde erfolgreich gelöscht.');
    }

}