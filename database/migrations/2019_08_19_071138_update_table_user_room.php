<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableUserRoom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_room', function (Blueprint $table) {
            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_room')->references('id_room')->on('room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_room', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['id_room']);
        });
    }
}
