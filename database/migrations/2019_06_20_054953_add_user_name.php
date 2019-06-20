<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->string('username');
        });
        //
        Schema::table('comments', function(Blueprint $table)
        {
            $table->string('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tasks', function(Blueprint $table)
        {
            $table->dropColumn('username');
        });
        //
        Schema::table('comments', function(Blueprint $table)
        {
            $table->dropColumn('username');
        });
    }
}
