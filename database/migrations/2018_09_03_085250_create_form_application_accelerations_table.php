<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormApplicationAccelerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_application_accelerations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('aplication_service_deliveries_id');
			$table->string('ip_server_lb');
			$table->string('port');
			$table->string('ssl');
			$table->string('url');
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
        Schema::dropIfExists('form_application_accelerations');
    }
}
