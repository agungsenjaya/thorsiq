<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('company_name')->nullable();
            $table->string('vat')->nullable();
            $table->string('telegram_id');
            $table->string('twitter_id');
            $table->bigInteger('phone');
            $table->bigInteger('phone_2');
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('contract_address');
            $table->longText('street');
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
        Schema::dropIfExists('user_infos');
    }
}
