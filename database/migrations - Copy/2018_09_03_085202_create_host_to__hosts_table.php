<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostToHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_to__hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('form_host_to_host.id');
			$table->string('link_komunikais');
			$table->string('site');
			$table->string('ip_server_partner');
			$table->string('ip_server_bca');
			$table->string('ip_p2p_bca');
			$table->string('ip_p2p_partner');
			$table->string('port_aplikasi');
			$table->string('nama_aplikasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('host_to__hosts');
    }
}
