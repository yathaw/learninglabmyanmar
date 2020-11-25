<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsedetails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('check_id')
                    ->references('id')
                    ->on('checks')
                    ->onDelete('cascade');
            $table->foreignId('quiz_id')
                    ->references('id')
                    ->on('quizzes')
                    ->onDelete('cascade');
            $table->foreignId('response_id')
                    ->references('id')
                    ->on('responses')
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
        Schema::dropIfExists('responsedetails');
    }
}
