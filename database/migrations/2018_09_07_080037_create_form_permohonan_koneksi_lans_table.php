<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPermohonanKoneksiLansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_permohonan_koneksi_lans', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service_id');
            $table->dateTime('start_date')->nullable();
            $table->datetime('expected_finish_date')->nullable();
			$table->date('finish_date')->nullable();
			$table->string('pic');
			$table->date('tanggal_pemakaian');
			$table->string('lokasi');
			$table->string('lantai');
			$table->string('antivirus');
			$table->string('total_user_per_device');
			$table->string('koneksi_ke_switch');
			$table->string('port_switch');
			$table->string('segment_ip_address');
			$table->string('ip_phone');
			$table->string('lama_pemakaian');
			$table->string('bypass_nas_ise');
            $table->longText('mac_address');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_permohonan_koneksi_lans');
    }
}
