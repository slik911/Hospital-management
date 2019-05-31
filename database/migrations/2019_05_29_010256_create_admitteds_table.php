<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmittedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admitteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id');
            $table->string('admission_date');
            $table->boolean('discharged')->default(false);
            $table->string('discharge_date')->nullable();
            $table->string('cause');
            $table->string('ward');
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
        Schema::dropIfExists('admitteds');
    }
}
