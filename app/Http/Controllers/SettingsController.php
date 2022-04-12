<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('settings');
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'newPassword' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return $this->returnErrors('Versuchs doch einfach nochmal.' . $validator->errors());
        }

        $user = Auth::user();
        $user->password = Hash::make($request->get('newPassword'));
        $user->save();
        return $this->returnSuccess("Das Password wurde erfolgreich geändert.");
    }

    public function changeName(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        if ($validator->fails()) {
            return $this->returnErrors('Versuchs doch einfach nochmal.');
        }

        $targetUser = User::all()->where('email', $request->get('email'))->first();
        if ($targetUser != null
            && $targetUser->id != Auth::user()->id) {
            return $this->returnErrors('Versuchs doch einfach nochmal.');
        }

        $user = Auth::user();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();
        return $this->returnSuccess("Der Name wurde erfolgreich geändert.");
    }


}