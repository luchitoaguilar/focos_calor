<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var string[]
     */
    protected $fillable = [
        'rol',
        'creador_id', 'modificador_id',
        'fecha_creado', 'fecha_modificado'
    ];


    /**
     * @var string[]
     */
    protected $hidden = [
        'creador_id', 'modificador_id'
    ];

    /**
     * @var string[]
     */
    protected $with = [

    ];
}
