<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormKoneksiDeviceKeJaringansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_koneksi_device_ke_jaringans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service_id');
			$table->string('pic');
            $table->dateTime('start_date')->nullable();
            $table->datetime('expected_finish_date')->nullable();
            $table->dateTime('finish_date')->nullable();
			$table->string('nama_server');
			$table->string('ip_address');
			$table->string('koneksi_perangkat_network');
			$table->string('interface');
			$table->string('deskripsi')->nullable();
            $table->foreign('service_id')->references('id')->on('services');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_koneksi_device_ke_jaringans');
    }
}
