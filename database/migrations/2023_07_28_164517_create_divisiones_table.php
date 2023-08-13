<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDivisionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisiones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 60);
            $table->string('nombre', 60);
            $table->string('ubicacion')->nullable();
            $table->string('tipo', 60)->nullable();
            $table->integer('activo')->default(1);
            $table->unsignedInteger('creator_id');
            $table->timestamps();

            $table->foreign('creator_id')->references('id')->on('users')->onDelete('restrict');
        });

        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-1',
            'nombre'              => 'PRIMERA DIVISION',
            'ubicacion'     => 'COBIJA',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-2',
            'nombre'              => 'SEGUNDA DIVISION',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-3',
            'nombre'              => 'TERCERA DIVISION',
            'ubicacion'     => 'VILLAMONTES',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-4',
            'nombre'              => 'CUARTO DIVISION',
            'ubicacion'     => 'CAMIRI',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-5',
            'nombre'              => 'QUINTA DIVISION',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-6',
            'nombre'              => 'SEXTA DIVISION',
            'ubicacion'     => 'TRINIDAD',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-7',
            'nombre'              => 'SEPTIMA DIVISION',
            'ubicacion'     => 'COCHABAMBA',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-8',
            'nombre'              => 'OCTAVA DIVISION',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-9',
            'nombre'              => 'NOVENA DIVISION',
            'ubicacion'     => 'IBUELO',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-10',
            'nombre'              => 'DECIMA DIVISION',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
        \App\Models\Divisiones::create([
            'codigo'          => 'DIV-MEC-1',
            'nombre'              => 'PRIMERA DIVISION MECANIZADA',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'GG.UU',
            'creator_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisiones');
    }
}
