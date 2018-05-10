<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZongceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zongce', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sdut_id',11)->nullable();
            $table->string('name',30)->nullable();
            $table->string('grade',4)->nullable();
            $table->string('academy',30)->nullable();
            $table->string('major',30)->nullable();
            $table->string('class_name',20)->nullable();
            $table->string('year',20)->nullable();
            $table->string('term',20)->nullable();
            $table->string('zy_class',10)->nullable();
            $table->string('zy_grade',10)->nullable();
            $table->string('zc_class',10)->nullable();
            $table->string('zc_grade',10)->nullable();
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
        Schema::dropIfExists('zongce');
    }
}
