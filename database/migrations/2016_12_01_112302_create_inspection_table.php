<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection', function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('detail');
            $table->integer('region_id')->unsigned();
            $table->foreign('region_id')->references('id')->on('region');
            $table->integer('manager_id')->unsigned();
            $table->integer('local_technician_id')->unsigned();
            $table->string('status');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inspection');
    }
}
