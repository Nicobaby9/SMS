<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSchoolNameToFrontendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('frontends', function (Blueprint $table) {
            $table->string('school_name')->after('id');
            $table->string('logo')->after('instagram');
            $table->string('background_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('frontends', function (Blueprint $table) {
            $table->dropColumn('school_name');
            $table->dropColumn('logo');
            $table->dropColumn('background_image');
        });
    }
}
