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
        Schema::create('form__pendaftaran__remote__accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service.id');
			$table->string('pic');
			$table->date('create_date');
			$table->date('finish date');
			$table->string('jenis_remote_access');
			$table->string('jenis_user_remote');
			$table->string('environment');
			$table->string('unit_kerja');
			$table->string('berlaku_sampai_dengan');
			$table->string('nama_pic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form__pendaftaran__remote__accesses');
    }
}
