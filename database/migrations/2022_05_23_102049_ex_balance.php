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
        Schema::create('ex_balance', function(Blueprint $table){
            $table->increments('id');
            $table->foreignId('tracker_info_id');
            $table->integer('net_balance')->default(0);
            $table->integer('income')->default(0);
            $table->integer('expense')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('ex_balance');
    }
};
