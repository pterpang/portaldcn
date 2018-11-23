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
        Schema::create('form__open__ports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service.id');
			$table->string('pic');
			$table->date('create_date');
			$table->date('finish date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form__open__ports');
    }
}
