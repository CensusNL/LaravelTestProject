<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');

            $table->string('first_name', 120);
            $table->string('last_name', 120);
            $table->string('city', 120);
            $table->string('zip', 120);
            $table->unsignedInteger('number');
            $table->string('number_extra');
            $table->string('street', 120);
            $table->string('country', 2);
            $table->string('phone', 10);
            $table->string('company', 120);
            $table->string('job_title', 120);
            $table->string('ip', 1);
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
    }
}
