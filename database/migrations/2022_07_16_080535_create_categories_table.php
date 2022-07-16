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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->default(0)->nullable();
            $table->string('title',150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image',100)->nullable();
            $table->string('status',150)->nullable()->default('False');
            $table->timestamps();// create cerated_At , updated_at at fields
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
