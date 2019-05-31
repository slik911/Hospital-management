<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address');
            $table->string('gender');
            $table->string('dob');
            $table->string('phone');
            $table->string('nnok');
            $table->string('relationship');
            $table->string('phnok');
            $table->string('card_no');
            $table->boolean('admitted')->default(false);
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('patients');
    }
}
