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
        Schema::create('commands', function (Blueprint $table) {
            $table->uuid('id')
                ->primary();
            $table->timestamps();
            $table->string('name');
            $table->integer('position');
            $table->uuid('competition_id')
                ->comment('ID соревнования');
            $table->foreign('competition_id')
                ->references('id')
                ->on('competitions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands');
    }
};
