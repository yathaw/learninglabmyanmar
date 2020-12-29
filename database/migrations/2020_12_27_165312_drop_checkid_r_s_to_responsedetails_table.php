<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCheckidRSToResponsedetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsedetails', function (Blueprint $table) {
            $table->dropForeign('responsedetails_check_id_foreign');
            $table->foreignId('check_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('responsedetails', function (Blueprint $table) {
            $table->dropForeign('responsedetails_check_id_foreign');
            //
        });
    }
}
