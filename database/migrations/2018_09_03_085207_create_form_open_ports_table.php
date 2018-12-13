<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormOpenPortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_open_ports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service_id');
			$table->string('pic');
			$table->dateTime('start_date')->nullable();
			$table->datetime('expected_finish_date')->nullable();
			$table->date('finish_date')->nullable();
			$table->string('source_ip');
			$table->string('destination_ip');
			$table->string('protocol');
			$table->string('port');
            $table->string('arah');
            $table->string('action');
            $table->string('fungsi')->nullable();
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
        Schema::dropIfExists('form_open_ports');
    }
}
