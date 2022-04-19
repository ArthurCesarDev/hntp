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
            $table->id();
            $table->string('email');
            $table->string('password');
        });
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('slug');
        });
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->integer('id_page');
            $table->integer('slug');
            $table->integer('order');
            $table->string('title');
            $table->string('descricao');
            $table->string('quantidade');
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
        Schema::dropIfExists('pages');
        Schema::dropIfExists('links');
    }
};
