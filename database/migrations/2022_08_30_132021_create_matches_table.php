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
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->timestamps();

            $table->uuid('command_first_id')
                ->comment('ID команды');
            $table->foreign('command_first_id')
                ->references('id')
                ->on('commands');

            $table->uuid('command_second_id')
                ->comment('ID команды');
            $table->foreign('command_second_id')
                ->references('id')
                ->on('commands');

            $table->uuid('winner_id')
                ->nullable()
                ->comment('ID команды победителей');
            $table->foreign('winner_id')
                ->references('id')
                ->on('commands');

            $table->integer('command_first_goals');
            $table->integer('command_second_goals');

            $table->string('status');
            $table->date('date_of_match');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
