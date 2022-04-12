<?php


namespace App\Api;

use App\Musicbot;
use HttpRequest;

class MusicbotApi
{

    private $address;
    private $port;
    private $apiToken;
    /** @var Musicbot */
    private $bot;

    public function __construct($address, $port, $apiToken, $bot)
    {
        $this->address = $address;
        $this->port = $port;
        $this->apiToken = $apiToken;
        $this->bot = $bot;
    }

    public function information()
    {
        return $this->request('info', ['botId' => $this->bot->id]);
    }

    public function online()
    {
        $information = $this->information();
        if ($information == null) return false;
        if (array_key_exists('error', $information->data) && $information->data->error == 'Bot is offline!')
            return false;
        else return true;
    }

    public function uptime()
    {
        $information = $this->information();
        if ($information == null) return null;
        if (array_key_exists('error', $information->data) && $information->data->error == 'Bot is offline!') return null;
        return $information->data->uptime;
    }

    public function start()
    {

    }

    public function request($action, $data)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_PORT => "8909",
            CURLOPT_URL => 'http://' . $this->address . ':' . $this->port . '/api/v1/' . $action,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 5,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "token: " . $this->apiToken
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return json_decode($response);
        }
    }

}