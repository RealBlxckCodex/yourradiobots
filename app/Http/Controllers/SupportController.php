<?php


namespace App\Http\Controllers;


use App\Notifications\SupportTicketNotification;
use App\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use NotificationChannels\Telegram\TelegramMessage;

class SupportController extends Controller
{

    public function list()
    {
        return view('support.list');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'priority' => 'required|string',
            'support_category_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);
        if ($validator->fails()) {
            toast()->error('Bitte überprüfe deine Eingaben ' . $validator->errors());
            return back()->withInput($request->all());
        }

        $support = new Support($request->all());
        $support->creator_id = $request->user()->id;
        $support->state = 'open';
        $support->save();

        $request->user()->notify(new SupportTicketNotification($support));

        return $this->returnSuccess('Es wurde erfolgreich ein Ticket erstellt.');
    }

}