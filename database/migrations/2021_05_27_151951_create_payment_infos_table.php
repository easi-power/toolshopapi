<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->id();
            $table->string('card_name', 50);
            $table->string('card_number', 50);
            $table->string('expiration_month', 2);
            $table->string('expiration_year', 2);
            $table->foreignId('method_id');
            $table->foreignId('user_id');
            $table->timestamps();

            $table->foreign('method_id')->references('id')->on('payment_methods');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payment_infos');
    }
}
