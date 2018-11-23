<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranRemoteAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran__remote__accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('pendaftaran__remote__accesses.id');
			$table->string('nama_server');
			$table->string('ip_address');
			$table->string('protocol');
			$table->string('port');
			$table->string('client');
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
        Schema::dropIfExists('pendaftaran__remote__accesses');
    }
}
