<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slogan');
            $table->string('students');
            $table->string('educator');
            $table->string('teacher');
            $table->string('course');
            $table->string('content1_title');
            $table->text('content1_body');
            $table->string('content1_photo');
            $table->string('content2_title');
            $table->text('content2_body');
            $table->string('content2_photo');
            $table->string('content3_title');
            $table->text('content3_body');
            $table->string('content3_photo');
            $table->string('profile1_photo');
            $table->string('profile1_title');
            $table->text('profile1_body');
            $table->string('profile2_photo');
            $table->string('profile2_title');
            $table->text('profile2_body');
            $table->string('profile3_photo');
            $table->string('profile3_title');
            $table->text('profile3_body');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
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
        Schema::dropIfExists('frontends');
    }
}
