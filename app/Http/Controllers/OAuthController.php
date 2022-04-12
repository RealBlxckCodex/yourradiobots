<?php


namespace App\Http\Controllers;


use Abraham\TwitterOAuth\TwitterOAuth;
use App\User;
use Carbon\Carbon;
use Google_Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OAuthController extends Controller
{

    public function registerTwitter()
    {
        if (Auth::check()) return back();
        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_API'), env('TWITTER_CONSUMER_API_SECRET'), env('TWITTER_CONSUMER_ACCESS'), env('TWITTER_CONSUMER_ACCESS_SECRET'));
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => env('APP_URL') . '/oauth/twitter/callback'));
        Session::put('oauth_token', $request_token['oauth_token']);
        Session::put('oauth_token_secret', $request_token['oauth_token_secret']);
        return redirect('https://api.twitter.com/oauth/authenticate?oauth_token=' . $request_token['oauth_token']);
    }

    public function callbackGoogle()
    {
        $g_client = new Google_Client();
        $g_client->setClientId(env('GOOGLE_CLIENT_ID'));
        $g_client->setClientSecret(env('GOOGLE_CLIENT_KEY'));
        $g_client->setRedirectUri(env("APP_URL") . "/oauth/google/callback");
        $g_client->setScopes(['email', 'profile']);

        $code = Input::get('code');
        if ($code == null) return 'code missing';
        $token = $g_client->fetchAccessTokenWithAuthCode($code);
        $g_client->setAccessToken($token);
        $pay_load = $g_client->verifyIdToken();
        $user = User::all()->where('email', $pay_load['email'])->first();
        if ($user == null) {
            $user = new User([
                'name' => $pay_load['name'],
                'email' => $pay_load['email']
            ]);
            $user->profile_image_url = $pay_load['picture'];
            $user->password = Hash::make(Str::random(32));
            $user->email_verified_at = Carbon::now();
            $user->save();
        }
        Auth::loginUsingId($user->id);
        toast()->success('Du hast dich erfolgreich eingeloggt');
        return redirect(route('dashboard'));
    }

    public function registerGoogle()
    {
        $g_client = new Google_Client();
        $g_client->setClientId(env('GOOGLE_CLIENT_ID'));
        $g_client->setClientSecret(env('GOOGLE_CLIENT_KEY'));
        $g_client->setRedirectUri(env("APP_URL") . "/oauth/google/callback");
        $g_client->setScopes(['email', 'profile']);
        return redirect($g_client->createAuthUrl());
    }

    public function callbackTwitter()
    {
        if (Auth::check()) return back();
        $oauth_verifier = Input::get('oauth_verifier');
        if (Input::get('oauth_token') == null || $oauth_verifier == null) return $this->returnErrors('oauth_token || oauth_verifier fehlt');
        if (!Session::has('oauth_token')) return $this->returnErrors('session data missing');
        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_API'), env('TWITTER_CONSUMER_API_SECRET'), Session::get('oauth_token'), Session::get('oauth_token_secret'));
        $access_token = $connection->oauth("oauth/access_token", ["oauth_verifier" => $oauth_verifier]);
        $connection = new TwitterOAuth(env('TWITTER_CONSUMER_API'), env('TWITTER_CONSUMER_API_SECRET'), $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $verifyCredentials = $connection->get("account/verify_credentials", ['include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true']);
        $user = User::all()->where('email', $verifyCredentials->email)->first();
        if ($user != null) {
            if (!($user->twitter_access_token == $access_token['oauth_token'])) {
                return 'melde dich im support: Code: 13376954133769871337691313376979';
            }
        } else {
            $user = new User([
                'name' => $verifyCredentials->name,
                'email' => $verifyCredentials->email
            ]);
            $user->profile_image_url = $verifyCredentials->profile_image_url;
            $user->password = Hash::make(Str::random(32));
            $user->twitter_access_token = $access_token['oauth_token'];
            $user->twitter_access_token_secret = $access_token['oauth_token_secret'];
            $user->email_verified_at = Carbon::now();
            $user->save();
        }
        Auth::loginUsingId($user->id);
        toast()->success('Du hast dich erfolgreich eingeloggt');
        return redirect(route('dashboard'));
    }

}