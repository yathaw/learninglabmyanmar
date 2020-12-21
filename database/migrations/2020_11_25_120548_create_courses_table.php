<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('subtitle');
            $table->text('description');
            $table->text('image');
            $table->text('video');
            $table->smallInteger('status');
            $table->text('requirements');
            $table->text('outline');
            $table->string('certificate');
            $table->string('share');
            $table->integer('price');
            $table->foreignId('level_id')
                    ->references('id')
                    ->on('levels')
                    ->onDelete('cascade');
            $table->foreignId('subcategory_id')
                    ->references('id')
                    ->on('subcategories')
                    ->onDelete('cascade');
            
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('course_instructor', function (Blueprint $table) {
            $table->id();

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
        Schema::dropIfExists('courses');
    }
}
