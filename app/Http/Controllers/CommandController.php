<?php


namespace App\Http\Controllers;


use App\Bot;
use App\BotUser;
use App\BotUserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommandController extends Controller
{
    public $commands = ['play', 'stop', 'pause'];

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
        return view('bot.command.view', compact(['bot']));
    }

    public function deleteUser(Bot $bot, BotUser $botUser)
    {
        if ($bot->user_id != Auth::user()->id || $botUser->bot_id != $bot->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }
        foreach (BotUserPermission::all()->where('bot_user_id', $botUser->id) as $botUserPermission) {
            $botUserPermission->delete();
        }
        $botUser->delete();
        $bot->api->request('update', ['botId' => $bot->id, 'permission' => $bot->buildPermissionObject()]);

        return $this->returnSuccess('Der Benutzer wurde erfolgreich gelöscht.');
    }

    public function editUser(Request $request, Bot $bot, BotUser $botUser)
    {
        if ($bot->user_id != Auth::user()->id || $botUser->bot_id != $bot->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        if (BotUser::all()->where('bot_id', $bot->id)->count() > 25) {
            return $this->returnErrors("Du kannst maximal nur 25 Benutzer hinzufügen.");
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30'],
            'uid' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.' . $validator->errors());
            return back()->withInput();
        }

        $botUser->name = $request->get('name');
        $botUser->uid = $request->get('uid');
        $botUser->save();

        foreach ($this->commands as $command) {
            $permission = $botUser->getPermission($command);
            if ($request->get($command) == "on") {
                if (!$permission != null){
                    $botUserPermission = new BotUserPermission([
                        'bot_user_id' => $botUser->id,
                        'permission' => $command
                    ]);
                    $botUserPermission->save();
                }
            } else {
                if ($permission != null)
                    $permission->delete();
            }
        }

        $bot->api->request('update', ['botId' => $bot->id, 'permission' => $bot->buildPermissionObject()]);

        return $this->returnSuccess("Du hast erfolgreich den Benutzer editiert.");
    }

    public function create(Request $request, Bot $bot)
    {
        if ($bot->user_id != Auth::user()->id) {
            toast()->error('Versuchs doch einfach nochmal.');
            return back();
        }

        if (BotUser::all()->where('bot_id', $bot->id)->count() > 25) {
            return $this->returnErrors("Du kannst maximal nur 25 Benutzer hinzufügen.");
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:30'],
            'uid' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            toast()->error('Versuchs doch einfach nochmal.' . $validator->errors());
            return back()->withInput();
        }

        $botUser = new BotUser($request->all());
        $botUser->bot_id = $bot->id;
        $botUser->enabled = true;
        $botUser->save();

        foreach ($this->commands as $command) {
            if ($request->get($command) == "on") {
                $botUserPermission = new BotUserPermission([
                    'bot_user_id' => $botUser->id,
                    'permission' => $command
                ]);
                $botUserPermission->save();
            }
        }

        return $this->returnSuccess("Du hast erfolgreich einen Benutzer angelegt.");
    }

}