<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropForeign('assignments_content_id_foreign');
            $table->dropColumn(['content_id']);

        });
        
        Schema::table('attachments', function (Blueprint $table) {

            $table->dropForeign('attachments_user_id_foreign');
            $table->dropColumn(['user_id']);

            $table->dropForeign('attachments_assignment_id_foreign');
            $table->dropColumn(['assignment_id']);

        });
        Schema::drop('assignments');
        
        Schema::drop('attachments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assignments');
        Schema::drop('attachments');
    }
}
