<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('collection_course', function (Blueprint $table) {
            $table->id();
            $table->string('sorting');
            
            $table->foreignId('collection_id')
                    ->references('id')
                    ->on('collections')
                    ->onDelete('cascade');

            $table->foreignId('course_id')
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('collections');
    }
}
