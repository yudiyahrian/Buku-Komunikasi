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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nip');
            $table->string('address');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('no_telp');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('class');
            $table->unique('class_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('teachers');
        Schema::enableForeignKeyConstraints();
    }
};
