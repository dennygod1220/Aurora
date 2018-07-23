<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slot_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',180);
            $table->string('name');
            $table->string('prize')->comment('獎品');
            $table->date('playdate')->comment('玩遊戲的日期');
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
        Schema::dropIfExists('slot_infos');
    }
}
