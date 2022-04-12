<?php

namespace App;

use App\Api\MusicbotApi;
use Illuminate\Database\Eloquent\Model;

class Bot extends \LiamWiltshire\LaravelJitLoader\Model
{
    protected $fillable = ['bot_name', 'server_password', 'server_address', 'volume', 'channel_name', 'channel_password', 'avatar_url', 'song_url', 'hostsystem_id'];

    protected $casts = ['expire_at' => 'datetime'];

    public function getApiAttribute(): MusicbotApi
    {
        $hostSystem = Hostsystem::all()->where('id', $this->hostsystem_id)->first();
        return new MusicbotApi($hostSystem->address, $hostSystem->port, $hostSystem->apiToken, $this);
    }

    public function buildPermissionObject()
    {
        $object = [];
        foreach (BotUser::all()->where('bot_id', $this->id) as $botUser) {
            $permissions = [];
            foreach ($botUser->getPermissionUsers() as $permissionUser) {
                array_push($permissions, $permissionUser->permission);
            }
            array_push($object, [
                'ClientUid' => $botUser->uid,
                'permissions' => $permissions,
            ]);
        }
        return $object;
    }

    public function stopAndDelete()
    {
        if ($this->api->online())
            $this->api->request('stop', ['botId' => $this->id]);
        $this->delete();
    }
}
