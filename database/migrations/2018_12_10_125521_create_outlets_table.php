<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->string('descripcion');
            $table->string('latitude', 15)->nullable();
            $table->string('longitude', 15)->nullable();
            $table->integer('division');
            $table->integer('unidad');
            $table->string('nivel', 10)->nullable();
            $table->string('acciones', 5000)->nullable();
            $table->string('rrhh', 5000)->nullable();
            $table->string('rr_log', 5000)->nullable();
            $table->string('apoyo',5000)->nullable();
            $table->integer('efectivo')->nullable();
            $table->integer('unidad_apoyo')->nullable();
            $table->date('fecha');
            $table->string('foto', 5000)->nullable();
            $table->string('video', 5000)->nullable();
            $table->string('archivo', 5000)->nullable();
            $table->string('resumen', 5000)->nullable();
            $table->string('encargado', 5000);

            $table->integer('activo')->default(1);
            $table->integer('eliminar')->default(1);
            $table->unsignedInteger('creador_id');
            $table->timestamps();

            $table->foreign('creador_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outlets');
    }
}
