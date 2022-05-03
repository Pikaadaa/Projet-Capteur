<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('brand');
            $table->string('model');
            $table->string('registration');
            $table->integer('kilometer');
            $table->integer('year_of_manufacture')->nullable();
            $table->dateTime('date_of_establishment')->nullable();
            $table->foreignId('captur_id')->referances('id')->on('capturs')->nullable();
            //$table->foreignId('mission_id')->referances('id')->on('missions');
            $table->foreignId('employee_id')->referances('id')->on('employees')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
