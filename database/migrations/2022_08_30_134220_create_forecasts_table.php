<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->timestamps();

            $table->integer('command_first_goals');
            $table->integer('command_second_goals');

            $table->uuid('user_id')
                ->comment('ID user');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->uuid('match_id')
                ->comment('ID матча');
            $table->foreign('match_id')
                ->references('id')
                ->on('matches');

            $table->uuid('group_id')
                ->comment('ID группы');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups');

            $table->uuid('winner_id')
                ->comment('ID победителя');
            $table->foreign('winner_id')
                ->references('id')
                ->on('commands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forecasts');
    }
};
