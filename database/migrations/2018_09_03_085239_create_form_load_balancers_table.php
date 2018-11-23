<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormLoadBalancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_load_balancers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('aplication_service_deliveries_id');
			$table->string('ip_server');
			$table->string('ip_load_balancer');
			$table->string('port');
			$table->string('url');
			$table->string('ssl');
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
        Schema::dropIfExists('form_load_balancers');
    }
}
