<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('clicks', 'user_id')) {
            Schema::table('clicks', function ($table) {
                $table->string('user_id')->after('employee_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('clicks', 'user_id')) {
            Schema::table('clicks', function ($table) {
                $table->dropColumn('user_id');
            });
        }
    }
}
