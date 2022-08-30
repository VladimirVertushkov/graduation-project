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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->rememberToken();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('name');

            $table->date('date_of_birth');

//            $table->uuid('country_id')
//                ->comment('ID страны');
//            $table->foreign('country_id')
//                ->references('id')
//                ->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
