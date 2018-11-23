<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormKoneksiDeviceKeJaringansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form__koneksi__device_ke__jaringans', function (Blueprint $table) {
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
        Schema::dropIfExists('form__koneksi__device_ke__jaringans');
    }
}
