<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->text('file');
            $table->string('type');
            $table->foreignId('content_id')
                    ->references('id')
                    ->on('contents')
                    ->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->string('timeline');
            $table->foreignId('lesson_id')
                    ->references('id')
                    ->on('lessons')
                    ->onDelete('cascade');
            $table->foreignId('user_id')
                    ->references('id')
                    ->on('lessons')
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
        Schema::dropIfExists('lessons');
    }
}
