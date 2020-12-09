<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sale', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')
                    ->references('id')
                    ->on('courses')
                    ->onDelete('cascade');
            $table->foreignId('sale_id')
                    ->references('id')
                    ->on('sales')
                    ->onDelete('cascade');
            $table->smallInteger('status');
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
        Schema::dropIfExists('course_sale');
    }
}
