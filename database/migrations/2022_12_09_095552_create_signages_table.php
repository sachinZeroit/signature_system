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
        Schema::create('signages', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('user_id')->length(11);
            $table->integer('playlist_id')->length(11);
            $table->integer('device_id')->length(11);
            $table->string('pin',100);
            $table->string('zip_code',100);
            $table->string('status')->default(1);
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
        Schema::dropIfExists('signages');
    }
};
