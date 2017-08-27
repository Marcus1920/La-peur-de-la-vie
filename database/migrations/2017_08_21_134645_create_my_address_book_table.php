<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_addressbook', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('addressbook_owner');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('addressbook_owner')->references('id')->on('users');
            $table->integer('isfavourite')->default(1);
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
        Schema::drop('my_addressbook');
    }
}
