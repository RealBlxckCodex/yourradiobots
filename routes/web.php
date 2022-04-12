<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Bot;
use App\Support;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes(['verify' => true, 'register' => false]);
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->middleware('throttle:2,30');

Route::get('/logout', function () {
    if (Auth::check()) {
        Auth::logout();
    }
    return redirect(route('login'));
})->name('logout');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::get('bots', 'BotController@bots')->name('bots');
Route::get('logoutAdmin', function () {
    if (!session()->has('admin_id')) return back();
    Auth::loginUsingId(session()->get('admin_id'));
    toast()->success('Du wurdest wieder abgemeldet.');
    session()->remove('admin_id');
    return redirect(route('admin.users'));
})->name('back2admin');
Route::post('bots', 'BotController@createBot')->name('bot.create');
Route::prefix('bot/{bot}')->group(function () {
    Route::get('delete', 'BotController@deleteBot')->name('bot.delete');
    Route::get('start', 'BotController@startBot')->name('bot.start')->middleware('throttle:5,2');
    Route::get('stop', 'BotController@stopBot')->name('bot.stop')->middleware('throttle:5,2');
    Route::get('restart', 'BotController@restartBot')->name('bot.restart')->middleware('throttle:5,2');
    Route::get('stopaudioplay', 'BotController@stopAudioPlayBot')->name('bot.stopaudioplay')->middleware('throttle:5,2');
    Route::get('renew', 'BotController@renewBot')->name('bot.renew');
    Route::get('transfer', function (Bot $bot) {
        return view('bot.transfer', compact(['bot']));
    })->name('bot.transfer');
    Route::post('transfer', 'BotController@transferBot')->name('bot.transfer.post')->middleware('throttle:1,10');
    Route::post('settings', 'BotController@settingBot')->name('bot.settings')->middleware('throttle:5,1');
    Route::post('play', 'BotController@playBot')->name('bot.play')->middleware('throttle:5,1');
    Route::post('volume', 'BotController@volumeBot')->name('bot.volume');
    Route::get('/', 'BotController@viewBot')->name('bot.view');
    Route::prefix('music')->group(function () {
        Route::get('/', 'MusicController@index')->name('bot.music');
    });
    Route::prefix('command')->group(function () {
        Route::get('/', 'CommandController@index')->name('bot.command');
        Route::post('create', 'CommandController@create')->name('bot.command.create')->middleware('throttle:10,5');
        Route::prefix('{botUser}')->group(function () {
            Route::get('delete', 'CommandController@deleteUser')->name('bot.command.deleteuser');
            Route::post('edit', 'CommandController@editUser')->name('bot.command.edituser');
        });
    });
});
Route::get('settings', 'SettingsController@index')->name('settings');
Route::post('settings/password', 'SettingsController@changePassword')->name('settings.change.password');
Route::post('settings/name', 'SettingsController@changeName')->name('settings.change.name');
Route::prefix('oauth')->group(function () {
    Route::get('twitter/login', 'OAuthController@registerTwitter')->name('oauth.twitter.login');
    Route::get('twitter/register', 'OAuthController@registerTwitter')->name('oauth.twitter.register');
    Route::get('twitter/callback', 'OAuthController@callbackTwitter')->name('oauth.twitter.callback');
    Route::get('google/callback', 'OAuthController@callbackGoogle')->name('oauth.google.callback');
    Route::get('google/register', 'OAuthController@registerGoogle')->name('oauth.google.register');
    Route::get('google/login', 'OAuthController@registerGoogle')->name('oauth.google.login');
});

Route::get('session/{session_id}/delete', 'DashboardController@deleteSession')->name('session.delete');

Route::prefix('admin')->namespace('Admin')->middleware('admin')->group(function () {
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/users', 'AdminController@users')->name('admin.users');
    Route::get('/login/{user}', 'AdminController@loginAsUser')->name('admin.user.login');
});
Route::prefix('support')->middleware('auth')->group(function () {
    Route::get('/', 'SupportController@list')->name('support');
    Route::get('/create', function () {
        return view('support.create');
    })->name('support.create');
    Route::post('/create', 'SupportController@create')->name('support.create.post')->middleware('throttle:1,5');
});
Route::prefix('support/{support}')->group(function () {
    Route::get('/', function (Support $support) {
        if (!$support->creator_id == Auth::user()->id && !$support->editor_id == Auth::user()->id) {
            return abort(403);
        }
        return view('support.view', compact(['support']));
    })->name('support.view');
});

Route::get('impressum', function () {
    return view('impressum');
});
Route::get('datenschutz', function () {
    return view('datenschutz');
});
Route::get('agb', function () {
    return view('agbs');
});
