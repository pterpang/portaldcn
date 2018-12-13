<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormHostToHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_host_to_hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service_id');
			$table->string('pic');
            $table->dateTime('start_date')->nullable();
            $table->datetime('expected_finish_date')->nullable();
            $table->dateTime('finish_date')->nullable();
			$table->string('nama_partner');
			$table->string('link_komunikasi');
			$table->string('site');
			$table->string('ip_server_partner');
			$table->string('ip_server_bca');
			$table->string('ip_p2p_bca');
			$table->string('ip_p2p_partner');
            $table->string('protocol');
            $table->string('port_aplikasi');
            $table->string('nama_aplikasi');
            $table->string('arah_akses');
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
        Schema::dropIfExists('form_host_to_hosts');
    }
}
