<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 20)->nullable();
            $table->string('nama', 255)->nullable();
            $table->string('jenis_kelamin', 15)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->integer('umur_bulan')->nullable();
            $table->unsignedBigInteger('propinsi_id')->nullable();
            $table->unsignedBigInteger('kota_id')->nullable();
            $table->text('alamat_pasien')->nullable();
            $table->timestamps();

            $table->foreign('propinsi_id')->references('id')->on('propinsi')->onDelete('set null');
            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penduduk');
    }
}

