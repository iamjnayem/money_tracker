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
        Schema::create('ex_tracker_info', function (Blueprint $table){
            $table->increments('id');
            $table->foreignId('tracker_info_id');
            $table->foreignId('payment_method_id');
            $table->foreignId('category_id');
            $table->foreignId('balance_id');
            $table->integer('tracker_type');
            $table->integer('amount');
            $table->text('details');
            $table->string('image');
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
        Schema::dropIfExists('ex_tracker_info');
    }
};
