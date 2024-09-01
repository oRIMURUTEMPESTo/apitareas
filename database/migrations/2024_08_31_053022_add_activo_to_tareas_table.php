<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('tareas', function (Blueprint $table) {
        $table->boolean('activo')->default(true); // Columna para marcar como activo o inactivo
    });
}

public function down()
{
    Schema::table('tareas', function (Blueprint $table) {
        $table->dropColumn('activo');
    });
}

};
