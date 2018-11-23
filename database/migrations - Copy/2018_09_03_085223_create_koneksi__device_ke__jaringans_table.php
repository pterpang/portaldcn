<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoneksiDeviceKeJaringansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koneksi__device_ke__jaringans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('koneksi__device_ke__jaringans.id');
			$table->string('nama_server');
			$table->string('ip_address');
			$table->string('koneksi_perangkat_network');
			$table->string('interface');
			$table->string('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('koneksi__device_ke__jaringans');
    }
}
