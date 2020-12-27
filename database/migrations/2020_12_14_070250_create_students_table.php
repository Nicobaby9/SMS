<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nisn')->unique();
            $table->string('fullname');
            $table->string('religion');
            $table->string('gender');
            $table->date('birth');
            $table->string('phone')->unique();
            $table->string('photo')->nullable();
            $table->string('speciality');
            $table->string('address');
            $table->date('start_year')->nullable();
            $table->date('end_year');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reberse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
