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
        Schema::create('messages', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name',150);
            $table->string('email',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('subject',150)->nullable();
            $table->string('message')->nullable();
            $table->string('note',120)->nullable();
            $table->string('ip',50)->nullable();
            $table->string('status',5)->nullable()->default('Yeni');
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
        Schema::dropIfExists('messages');
    }
};
