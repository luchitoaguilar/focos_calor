<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 60);
            $table->string('nombre', 100);
            $table->string('ubicacion')->nullable();
            $table->string('tipo', 60)->nullable();
            $table->unsignedInteger('dependencia');
            $table->integer('activo')->default(1);
            $table->unsignedInteger('creador_id');
            $table->timestamps();

            //comentado por necesidad de users uni_id
            // $table->foreign('creador_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('dependencia')->references('id')->on('divisiones')->onDelete('restrict');
        });

        \App\Models\Unidades::create([
            'codigo'          => 'ADMIN',
            'nombre'              => 'ADMIN',
            'ubicacion'     => 'ADMIN',
            'tipo'     => 'ADMIN',
            'dependencia'     => 1,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RAA-6',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA ANTIAEREA 6 "MCAL. BILBAO RIOJA"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RAA-8',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA ANTIAEREA 8 "TCNL. FELIX AGUIRRE"',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'PP.UU',
            'dependencia'     => 8,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RECB-1',
            'nombre'              => 'REGIMIENTO DE CABELLERIA BLINDADA -1 "CALAMA"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'REEPPN-1',
            'nombre'              => 'REGIMIENTO ECOLOGICO ESCUELA PARQUES NATURALES -1 "CACIQUE MARAZA"',
            'ubicacion'     => 'IBUELO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 9,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'BATING-VII',
            'nombre'              => 'BATALLON DE INGENIERIA VII "SAJAMA"',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 2,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RESA-25',
            'nombre'              => 'REGIMIENTO DE SATINADORES ANDINOS 25 "TOCOPILLA"',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 2,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'BATING-II',
            'nombre'              => 'BATALLON DE INGENIERIA II "GRAL. FEDERICO ROMAN"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'BATING-II',
            'nombre'              => 'BATALLON DE INGENIERIA III "GRAL. JOSE MANUEL PANDO"',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'PP.UU',
            'dependencia'     => 5,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'BATING-VI',
            'nombre'              => 'BATALLON DE INGENIERIA VI "RIOSINHO"',
            'ubicacion'     => 'COBIJA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 1,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'R.FF.CC.AE-18',
            'nombre'              => 'REGIMIENTO DE FUERZAS DE COMANDOS AEROTRANSPORTADOS 18 "VICTORIA"',
            'ubicacion'     => 'COCHABAMBA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 7,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RA-1',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA 1 "CAMACHO"',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 2,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RA-3',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA 3 "PISAGUA"',
            'ubicacion'     => 'CAMIRI',
            'tipo'     => 'PP.UU',
            'dependencia'     => 3,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RA-4',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA 4 "TTE. ROSENDO BULLAIN"',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'PP.UU',
            'dependencia'     => 4,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RA-5',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA 5 "MY. ARTURO VERGARA"',
            'ubicacion'     => 'COCHABAMBA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 5,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RA-7',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA 7 "TUMUSLA"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 7,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-1',
            'nombre'              => 'REGIMIENTO DE CABALLERIA 1 "CNL. EDUARDO AVAROA"',
            'ubicacion'     => 'CAMIRI',
            'tipo'     => 'PP.UU',
            'dependencia'     => 4,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-10',
            'nombre'              => 'REGIMIENTO DE CABALLERIA 10 "CNL. JOSE M. MERCADO"',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'PP.UU',
            'dependencia'     => 8,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-2',
            'nombre'              => 'REGIMIENTO DE CABALLERIA 2 "BALLIVIAN"',
            'ubicacion'     => 'TRINIDAD',
            'tipo'     => 'PP.UU',
            'dependencia'     => 6,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-3',
            'nombre'              => 'REGIMIENTO DE CABALLERIA 3 "AROMA"',
            'ubicacion'     => 'VILLAMONTES',
            'tipo'     => 'PP.UU',
            'dependencia'     => 3,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-6',
            'nombre'              => 'REGIMIENTO DE CABELLERIA 6 "CAP. AGUSTIN CASTRILLO"',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'PP.UU',
            'dependencia'     => 5,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-7',
            'nombre'              => 'REGIMIENTO DE CABALLERIA 7 "CHICHAS"',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 10,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RC-8',
            'nombre'              => 'REGIMIENTO DE CABALLERIA 8 "BRAUN"',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 2,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RCB-2',
            'nombre'              => 'REGIMIENTO DE CABALLERIA MECANIZADA - 2 "TARAPACA"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'REIM-23',
            'nombre'              => 'REGIMIENTO ESCUELA DE INFANTERIA MECANIZADA 23 "MAX TOLEDO"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RCM-4',
            'nombre'              => 'REGIMIENTO DE CABALLERIA MECANIZADA - 4 "INGAVI"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RAA-6',
            'nombre'              => 'REGIMIENTO DE ARTILLERIA ANTIAEREA 6 "MCAL. BILBAO RIOJA"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'REA-2',
            'nombre'              => 'REGIMIENTO ESCUELA DE ARTILLERIA 2 "BOLIVAR"',
            'ubicacion'     => 'GUAQUI',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);


        \App\Models\Unidades::create([
            'codigo'          => 'RI-10',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 10 "CNL. IGNACIO WARNES"',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'PP.UU',
            'dependencia'     => 8,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-11',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 11 "BOQUERON"',
            'ubicacion'     => 'CAMIRI',
            'tipo'     => 'PP.UU',
            'dependencia'     => 4,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-13',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 13 "ISAMAEL MONTES"',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'PP.UU',
            'dependencia'     => 5,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-14',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 14 "FLORIDA"',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'PP.UU',
            'dependencia'     => 5,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-15',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 15 "JUNIN"',
            'ubicacion'     => 'ROBORE',
            'tipo'     => 'PP.UU',
            'dependencia'     => 5,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-17',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 17 "INDEPENDENCIA"',
            'ubicacion'     => 'TRINIDAD',
            'tipo'     => 'PP.UU',
            'dependencia'     => 6,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-19',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 19 "CAP. VICTOR USTARIZ"',
            'ubicacion'     => 'COCHABAMBA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 7,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-2',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 2 "MCAL. ANTONIO JOSE DE SUCRE"',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 10,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-20',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 20 "TCNL. MANUEL ASCENCIO PADILLA"',
            'ubicacion'     => 'VILLAMONTES',
            'tipo'     => 'PP.UU',
            'dependencia'     => 3,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-21',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 21 "ILLIMANI"',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 2,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-26',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 26 "BARRIENTOS"',
            'ubicacion'     => 'IBUELO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 9,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-27',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 27 "ANTOFAGASTA"',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 10,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-29',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 29 "LINO ECHEVERRIA"',
            'ubicacion'     => 'TRINIDAD',
            'tipo'     => 'PP.UU',
            'dependencia'     => 6,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-3',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 3 "GRAL. JUAN J. PEREZ"',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 10,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-5',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 5 "NARCISO CAMPERO"',
            'ubicacion'     => 'IBIBOBO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 3,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-31',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 31 "E. RIOS"',
            'ubicacion'     => 'IBUELO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 9,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-32',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 32 "IDELFONSO MURGUIA"',
            'ubicacion'     => 'IBUELO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 9,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-33',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 33 "LADISLAO CABRERA ICHOA"',
            'ubicacion'     => 'IBUELO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 9,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-35',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 35 "BRUNO RACUA"',
            'ubicacion'     => 'COBIJA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 1,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-4',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 4 "LOA"',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 10,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-6',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 6 "DANIEL CAMPOS"',
            'ubicacion'     => 'CAMIRI',
            'tipo'     => 'PP.UU',
            'dependencia'     => 4,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RI-7',
            'nombre'              => 'REGIMIENTO DE INFANTERIA 7 "GRAL. MANUEL MARZANA"',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'PP.UU',
            'dependencia'     => 8,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RIAT-30',
            'nombre'              => 'REGIMIENTO DE INFANTERIA ANTITANQUE 30 "PEDRO DOMINGO MURILLO"',
            'ubicacion'     => 'APOLO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RIM-8',
            'nombre'              => 'REGIMIENTO DE INFANTERIA MECANIZADA 8 "AYACUCHO"',
            'ubicacion'     => 'VIACHA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 11,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RSM-24',
            'nombre'              => 'REGIMIENTO DE SATINADORES DE MONTAÑA 24 "MENDEZ ARCOS"',
            'ubicacion'     => 'ORURO',
            'tipo'     => 'PP.UU',
            'dependencia'     => 2,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RSS-12',
            'nombre'              => 'REGIMIENTO DE SATINADORES DE SELVA 12 "CNL. FRANCISCO MANCHEGO"',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'PP.UU',
            'dependencia'     => 8,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'RSS-16',
            'nombre'              => 'REGIMIENTO DE SATINADORES DE SELVA 16 "TCNL. GERMAN JORDAN"',
            'ubicacion'     => 'TRINIDAD',
            'tipo'     => 'PP.UU',
            'dependencia'     => 6,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'BATING-V',
            'nombre'              => 'BATALLON DE INGENIERIA V "TCNL. NAPOLEON OVANDO"',
            'ubicacion'     => 'TUPIZA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 10,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'REPM-IV',
            'nombre'              => 'REGIMIENTO ESCUELA POLICIA MILITAR IV "SLDO. RODOLFO SILES"',
            'ubicacion'     => 'COBIJA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 1,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'REPM-II',
            'nombre'              => 'REGIMIENTO ESCUELA POLICIA MILITAR 2 "TTE. RUBEN AMEZAGA"',
            'ubicacion'     => 'SANTA CRUZ',
            'tipo'     => 'PP.UU',
            'dependencia'     => 8,
            'creador_id' => 1,
        ]);
        \App\Models\Unidades::create([
            'codigo'          => 'REPM-III',
            'nombre'              => 'REGIMIENTO ESCUELA POLICIA MILITAR 3 "GRAL. ESTEBAN ARZE"',
            'ubicacion'     => 'COCHABAMBA',
            'tipo'     => 'PP.UU',
            'dependencia'     => 7,
            'creador_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}
