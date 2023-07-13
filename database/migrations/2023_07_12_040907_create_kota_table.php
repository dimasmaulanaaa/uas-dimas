<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKotaTable extends Migration
{
    public function up()
    {
        Schema::create('kota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->string('name', 50);
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('propinsi')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('kota');
    }
}
