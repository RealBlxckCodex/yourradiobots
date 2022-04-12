<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotUser extends Model
{
    protected $fillable = ['name', 'uid'];

    public function getPermissionUsers()
    {
        return BotUserPermission::all()->where('bot_user_id', $this->id);
    }

    public function hasPermission($name)
    {
        return $this->getPermission($name) != null;
    }

    public function getPermission($name)
    {
        return $this->getPermissionUsers()->where('permission', $name)->first();
    }
}
