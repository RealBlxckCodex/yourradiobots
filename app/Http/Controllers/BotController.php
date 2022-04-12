<?php


namespace App\Http\Controllers;


use App\Bot;
use App\Hostsystem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class BotController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bots()
    {
        return view('bot.bots');
    }

    public function transferBot(Request $request, Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        $validator = Validator::make($request->all(), [
            'hostsystem_id' => ['required', 'integer'],
        ]);
        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        if ($bot->api->online()) $bot->api->request('stop', ['botId' => $bot->id]);

        $hostSystem = Hostsystem::all()->where('id', $request->get('hostsystem_id'))->where('enabled', 1)->first();
        if ($hostSystem == null || !$hostSystem->exists()) {
            toast()->error('Hostsystem offline');
            return back()->withInput();
        }
        if ($bot->hostsystem_id == $hostSystem->id) {
            return $this->returnErrors("Du bist bereits auf diesem Standort.");
        }

        $bot->hostsystem_id = $hostSystem->id;
        $bot->save();
        return $this->returnSuccess("Du wurdest erfolgreich auf " . $hostSystem->name . " transferiert.");
    }

    public function volumeBot(Request $request, Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        $validator = Validator::make($request->all(), [
            'volume' => ['required', 'integer', 'min:1', 'max:100'],
        ]);
        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }
        $bot->api->request('update', [
            'botId' => $bot->id,
            'volume' => $request->volume
        ]);

        return response()->json(['success' => true]);
    }

    public function playBot(Request $request, Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        $validator = Validator::make($request->all(), [
            'url' => ['required', 'string', 'max:255']
        ]);
        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back()->withInput();
        }
        if (empty($request->url)) return;
        $bot->api->request('play', [
            'botId' => $bot->id,
            'url' => $request->url
        ]);

        return response()->json(['success' => true]);
    }

    public function stopAudioPlayBot(Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        $bot->api->request('stopaudio', [
            'botId' => $bot->id
        ]);

        return $this->returnSuccess("Es wird nun keine Musik mehr abgespielt.");
    }

    public function renewBot(Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            return $this->returnErrors('Versuchs doch einfach nochmal.');
        }

        $diffInDays = $bot->expire_at->diffInHours(Carbon::now());
        if ($diffInDays > 30) {
            return $this->returnErrors("Du kannst den Bot erst 30 Stunden vor Ablauf verlängern.");
        }
        $bot->expire_at = Carbon::now()->addDays(7);
        $bot->save();
        return $this->returnSuccess("Du hast erfolgreich den Bot verlängert.");
    }

    public function createBot(Request $request)
    {

        if (Auth::user()->email_verified_at == null) {
            return $this->returnErrors('Bitte verifiziere erst deine Email.');
        }

        $validator = Validator::make($request->all(), [
            'bot_name' => ['required', 'string', 'max:30'],
            'server_address' => ['required', 'string', 'max:255'],
            'server_password' => [],
            'hostsystem_id' => ['required']
        ]);

        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.' . $validator->errors());
            return back()->withInput();
        }
        if (Bot::all()->where('user_id', Auth::user()->id)->count() >= 10 && Auth::user()->role != 'admin' && Auth::user()->role != 'partner') {
            return $this->returnErrors('Du hast bereits 10 Bots.');
        }
        $hostSystem = Hostsystem::all()->where('id', $request->get('hostsystem_id'))->where('enabled', 1)->first();
        if ($hostSystem == null || !$hostSystem->exists()) {
            toast()->error('Hostsystem offline');
            return back()->withInput();
        }

        $bot = new Bot($request->all());
        $bot->user_id = Auth::user()->id;
        $bot->expire_at = Carbon::now()->addDays(7);
        $bot->save();

        toast()->success('Du hast erfolgreich einen Bot erstellt.');
        return back();
    }

    public function deleteBot(Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        if ($bot->api->online()) {
            $this->stopBot($bot, true);
        }

        $bot->delete();
        toast()->success('Du hast erfolgreich den Bot gelöscht.');
        return back();
    }

    public function settingBot(Request $request, Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id)
            return $this->returnErrors('Versuchs doch einfach nochmal.');

        $validator = Validator::make($request->all(), [
            'bot_name' => ['required', 'string', 'max:30'],
            'server_address' => ['required', 'string', 'max:255'],
            'server_password' => ['nullable'],
            'volume' => ['required', 'integer', 'min:1', 'max:100'],
            'channel_name' => ['nullable', 'string', 'max:255'],
            'channel_password' => ['nullable', 'string', 'max:255'],
            'loop' => ['nullable'],
            'avatar_url' => ['nullable', 'url'],
            'song_url' => ['nullable', 'url']
        ]);

        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.' . $validator->errors());
            return back()->withInput();
        }

        $bot->update($request->all());
        if ($request->loop == "on")
            $bot->loop = true;
        $bot->save();

//        dd($bot->api->request('play', ['botId' => $bot->id, 'url' => 'http://stream01.ilovemusic.de/iloveradio1.mp3', 'bitrate' => 100]));
        if ($bot->api->online())
            $bot->api->request('update', [
                    'botId' => $bot->id,
                    'name' => $bot->bot_name,
                    'volume' => $bot->volume,
                    'channel' => $bot->channel_name,
                    'channelPassword' => $bot->channel_password,
                    'loop' => $bot->loop,
                    'avatar' => $bot->avatar_url,
                    'bitrate' => 112]
            );

        toast()->success('Du hast erfolgreich die Einstellungen gespeichert.');
        return back();
    }

    public function viewBot(Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }
        return view('bot.view', compact(['bot']));
    }

    public function restartBot(Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }
        if (Cookie::get('cooldown') == true) return $this->returnErrors('Bitte gedulde dich.');
        Cookie::make('cooldown', true, 5);

        $this->stopBot($bot, true);
        $this->startBot($bot, true);
        toast()->success('Der Bot wurde erfolgreich neugestartet.');
        return back();
    }

    public function startBot(Bot $bot, $ignore = false)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }
        if (Cookie::get('cooldown') == true) return $this->returnErrors('Bitte gedulde dich.');
        Cookie::make('cooldown', true, 5);

        $startData = ['botName' => $bot->bot_name, 'botId' => $bot->id, 'serverAdress' => $bot->server_address, 'channel' => $bot->channel_name, 'channelPassword' => $bot->channel_password];
        if ($bot->privateKey != null) {
            $startData['identity'] = [
                'privateKey' => $bot->privateKey,
                'offSet' => $bot->offSet,
            ];
        }

        $startData['version'] = [
            'build' => '5.0.0-alpha212 [Build: 1556813029]',
            'platform' => 'macOS',
            'sign' => '7M9RrXON8iXKOTe1N/lVC0ZuL1HIWuFyI4kWKpnTe3EUPf9LZf/tXGzRPHD2C1ih3JXxEuVuDSd46a9rwVWcAg=='
        ];

        $startData['message'] = [
            'quit' => 'YourRadioBots.eu'
        ];

        $startData['permission'] = $bot->buildPermissionObject();
        $startData['url'] = $bot->song_url;

        if ($bot->avatar_url != null) {
            $startData['avatar'] = $bot->avatar_url;
        } else $startData['avatar'] = 'https://cdn.discordapp.com/attachments/358722543420571649/588391507694845975/TS3-Logo.png';
        $response = $bot->api->request('start', $startData);
        if ($response == null) {
            if (!$ignore) toast()->error("Das Hostsystem ist gerade offline.");
            return back();
        }

        if (array_key_exists('error', $response->data)) {
            if ($response->data->error == "Bot already online!") {
                if (!$ignore) toast()->error("Der Bot ist bereits online.");
                return back();
            }
        }

        if (array_key_exists('identity', $response->data))
            if (array_key_exists('privateKey', $response->data->identity)) {
                $bot->privateKey = $response->data->identity->privateKey;
                $bot->offSet = $response->data->identity->offSet;
                $bot->save();
            }

        $bot->api->request('update', ['botId' => $bot->id, 'channel' => $bot->channel_name, 'channelPassword' => $bot->channel_password]);

        if (!$ignore) toast()->success('Der Bot wurde erfolgreich gestartet');
        return back();
    }

    public function stopBot(Bot $bot, $ignore = false)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }
        if (Cookie::get('cooldown') == true) return $this->returnErrors('Bitte gedulde dich.');
        Cookie::make('cooldown', true, 5);

        $response = $bot->api->request('stop', ['botId' => $bot->id]);
        if ($response == null) {
            if (!$ignore) toast()->error("Das Hostsystem ist gerade offline.");
            return back();
        }
        if (array_key_exists('error', $response->data)) {
            if ($response->data->error == "Bot is offline!") {
                if (!$ignore) toast()->error("Der Bot ist bereits offline.");
                return back();
            }
        }
        if (!$ignore)
            toast()->success('Der Bot wurde erfolgreich gestoppt.');
        return back();
    }

    private function getEmptiestHostSystem()
    {
        $hostSystem = null;
        $size = 999999;
        foreach (Hostsystem::all() as $temp) {
            $count = Bot::all()->where('hostsystem_id', $temp->id)->count();
            if ($count < $size && $temp->enabled) {
                $size = $count;
                $hostSystem = $temp;
            }
        }
        return $hostSystem;
    }
}