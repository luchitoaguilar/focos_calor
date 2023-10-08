<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;


class Divisiones extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'ubicacion', 'tipo', 'activo', 'creador_id',
    ];


/**
     * @var string
     */
    protected $table = 'divisiones';

    /**
     * @var string[]
     */
    protected $hidden = [
        'creador_id', 'usuario_modificado_id'
    ];

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
