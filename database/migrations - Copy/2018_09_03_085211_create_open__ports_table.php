<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenPortsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open__ports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('form_open_port.id');
			$table->string('source_ip');
			$table->string('destination_ip');
			$table->string('protocol');
			$table->string('port');
			$table->string('arah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('open__ports');
    }
}
