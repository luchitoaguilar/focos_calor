<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('rol')->unique();

            $table->unsignedBigInteger('creador_id');
            $table->unsignedBigInteger('modificador_id');
            $table->timestamps();

            // $table->foreign('creador_id')->references('id')->on('users')->onDelete('restrict');
            // $table->foreign('modificador_id')->references('id')->on('users')->onDelete('restrict');
        });

        \App\Models\Rol::create([
            'rol'                   => 'ADMINISTRADOR',
            'creador_id'     => 1,
            'modificador_id' => 1,
        ]);

        \App\Models\Rol::create([
            'rol'                   => 'DIVISION',
            'creador_id'     => 1,
            'modificador_id' => 1,
        ]);

        \App\Models\Rol::create([
            'rol'                   => 'UNIDAD',
            'creador_id'     => 1,
            'modificador_id' => 1,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
