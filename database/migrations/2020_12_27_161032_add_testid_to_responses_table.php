<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestidToResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeign('responses_quiz_id_foreign');
            $table->dropColumn(['quiz_id']);


            $table->foreignId('test_id')
                    ->references('id')
                    ->on('tests')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responses', function (Blueprint $table) {
            $table->dropForeign('responses_quiz_id_foreign');
            $table->dropColumn(['quiz_id']);
        });
    }
}
