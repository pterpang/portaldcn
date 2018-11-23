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
        Schema::create('form__host_to__hosts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('service.id');
			$table->string('pic');
			$table->date('create_date');
			$table->date('finish date');
			$table->string('nama_partner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form__host_to__hosts');
    }
}
