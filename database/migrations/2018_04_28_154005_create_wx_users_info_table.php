<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWxUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wx_users_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',20)->nullable();
            $table->string('sno',11)->unique()->nullable();
            $table->integer('academy')->nullable();
            $table->string('major')->nullable();
            $table->string('class_name')->nullable();
            $table->integer('dormitory')->nullable();
            $table->string('room')->nullable();
            $table->string('phone',11)->nullable();
            $table->integer('wx_user_id')->unique();
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
        Schema::dropIfExists('wx_users_info');
    }
}
