<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;


class Unidades extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo', 'nombre', 'ubicacion', 'tipo', 'dependencia', 'activo', 'creator_id',
    ];


/**
     * @var string
     */
    protected $table = 'unidades';

    /**
     * @var string[]
     */
    protected $hidden = [
        'creator_id', 'usuario_modificado_id'
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
