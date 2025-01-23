<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('team_user')) {
            Schema::create('team_user', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('team_id');
                $table->unsignedInteger('user_id');
                $table->timestamps();

                $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->unique(['team_id', 'user_id']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_user', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
}