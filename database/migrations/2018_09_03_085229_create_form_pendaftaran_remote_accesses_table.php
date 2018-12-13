<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormPendaftaranRemoteAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_pendaftaran_remote_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service_id');
			$table->string('pic');
            $table->dateTime('start_date')->nullable();
            $table->datetime('expected_finish_date')->nullable();
            $table->dateTime('finish_date')->nullable();
			$table->string('jenis_remote_access');
			$table->string('jenis_user_remote');
			$table->string('environment');
			$table->string('unit_kerja');
			$table->string('berlaku_sampai_dengan');
			$table->string('nama_pic');
			$table->string('nama_server');
			$table->string('ip_address');
			$table->string('protocol');
			$table->string('port');
			$table->string('client');
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
        Schema::dropIfExists('form_pendaftaran_remote_accesses');
    }
}
