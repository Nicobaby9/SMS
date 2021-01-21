<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPublishDateToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('id');
            $table->date('publish_date')->after('publisher');
            $table->string('language')->after('publish_date');
            $table->string('image')->nullable()->after('language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('category_id');
            $table->dropColumn('publish_date');
            $table->dropColumn('language');
            $table->dropColumn('image');
        });
    }
}
