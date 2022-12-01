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
        Schema::create('donvi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('loaidonvi');
            $table->text('description');
            $table->string('address');
            $table->string('webside');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('fax')->unique();
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
        Schema::dropIfExists('donvi');
    }
};
