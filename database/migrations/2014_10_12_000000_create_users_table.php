<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('rol_id')->constrained('roles')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('div_id')->constrained('divisiones')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('uni_id')->constrained('unidades')->cascadeOnUpdate()->restrictOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
        
        \App\User::create([
            'email'          => 'luchitoa@hotmail.com',
            'name'              => 'Luis Aguilar',
            'password'     => Hash::make('Luchit@2011'),
            'rol_id'     => 1,
            'div_id'    => 1,
            'uni_id'    =>1,
        ]);

        \App\User::create([
            'email'          => 'lopitos100@gmail.com',
            'name'              => 'My. Inf. José López Flores ',
            'password'     => Hash::make('5174533'),
            'rol_id'     => 1,
            'div_id'    => 1,
            'uni_id'    =>1,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
