<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('fullname')->after('id')->nullable();
            $table->bigInteger('role')->after('password')->unsigned()->default(1);
            $table->boolean('gender')->after('role')->default(0);
            $table->string('phone', 12)->after('gender')->nullable();
            $table->text('address')->after('phone')->nullable();
            $table->string('img')->after('address')->nullable();
            $table->boolean('trash')->after('img')->default(true);
            $table->boolean('status')->after('trash')->default(true);
            $table->foreign('role')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
