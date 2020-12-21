<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEducationToInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instructors', function (Blueprint $table) {
            $table->longText('education');
            $table->string('website')->nullable()->change();
            $table->string('twitter')->nullable()->change();
            $table->string('facebook')->nullable()->change();
            $table->string('linkedin')->nullable()->change();
            $table->string('youtube')->nullable()->change();
            $table->string('instagram')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructors', function (Blueprint $table) {
            //
        });
    }
}
