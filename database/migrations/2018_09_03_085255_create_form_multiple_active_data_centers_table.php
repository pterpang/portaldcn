<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormMultipleActiveDataCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_multiple_active_data_centers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('aplication_service_deliveries_id');
			$table->string('lokasi');
			$table->string('ip_server_lb');
			$table->string('port');
			$table->string('url');
			$table->string('persistence');
			$table->string('metode');
			$table->string('keterangan')->nullable();
            $table->date('finish_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_multiple_active_data_centers');
    }
}
