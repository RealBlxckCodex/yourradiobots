<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('hostsystem_id');
            $table->string('bot_name')->default('YourRadioBots.eu | Bot');;
            $table->string('server_address');
            $table->string('server_password')->nullable();;
            $table->string('channel_name')->nullable();;
            $table->string('channel_password')->nullable();;
            $table->boolean('loop')->default('0');;;
            $table->integer('volume')->default('10');;
            $table->string('privateKey')->nullable();
            $table->string('offSet')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('song_url')->nullable();
            $table->timestamp('expire_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bots');
    }
}
