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
        Schema::create('user_group', function (Blueprint $table) {
            $table->uuid('group_id')->comment = "Идентификатор группы";
            $table->foreign('group_id')->references('id')->on('groups');
            $table->uuid('user_id')->comment = "Идентификатор пользователя";
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('scores')->comment = "Счет пользователя в группе";
            $table->timestamps();
            $table->primary(['group_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_group');
    }
};
