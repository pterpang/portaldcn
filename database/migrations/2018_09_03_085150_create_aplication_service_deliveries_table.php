<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplicationServiceDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aplication_service_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service_id');
			$table->string('pic');
            $table->dateTime('start_date')->nullable();
            $table->datetime('expected_finish_date')->nullable();
			$table->date('finish_date')->nullable();
			$table->string('service_aplikasi')->nullable();
			$table->string('lokasi');
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
        Schema::dropIfExists('aplication_service_deliveries');
    }
}
