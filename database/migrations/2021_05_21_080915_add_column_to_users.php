<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('role', '50')->nullable(false);
          $table->string('phone', '50')->nullable();
          $table->string('firts_name')->nullable();
          $table->string('last_name')->nullable();
          $table->boolean('notification')->default(false)->nullable();
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
            $table->dropColumn('role');
            $table->dropColumn('phone');
            $table->dropColumn('firts_name');
            $table->dropColumn('last_name');
            $table->dropColumn('notification');
        });
    }
}
