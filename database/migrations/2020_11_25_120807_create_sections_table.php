<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('objective');
            $table->string('sorting');
            /*$table->foreignId('sectiontype_id')
                    ->references('id')
                    ->on('sectiontypes')
                    ->onDelete('cascade');*/
            $table->foreignId('course_id')
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');
            $table->foreignId('instructor_id')
                    ->references('id')
                    ->on('instructors')
                    ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('sections');
    }
}
