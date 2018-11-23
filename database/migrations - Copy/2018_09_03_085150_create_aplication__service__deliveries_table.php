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
        Schema::create('aplication__service__deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('id');
			$table->string('pic');
			$table->date('start_date');
			$table->date('finish_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aplication__service__deliveries');
    }
}
