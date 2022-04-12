<?php


namespace App\Http\Controllers;


use App\Bot;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        return view('bot.music.view', compact(['bot']));
    }

}