<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BotUserPermission extends Model
{
    protected $fillable = ['bot_user_id', 'permission'];
}
