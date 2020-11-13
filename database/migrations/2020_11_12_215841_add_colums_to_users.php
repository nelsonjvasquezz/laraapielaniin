<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre_real')->after('id');
            $table->string('telefono')->after('nombre_real');
            $table->string('fecha_nac')->after('name');
            $table->unique(['name', 'email']);
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
            $table->dropColumn('nombre_real');
            $table->dropColumn('telefono');
            $table->dropColumn('fecha_nac');
            $table->dropUnique('email');
        });
    }
}
