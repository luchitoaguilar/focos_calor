<?php

namespace App;

use App\Models\Divisiones;
use App\Models\Rol;
use App\Models\Unidades;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Yajra\DataTables\DataTables;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rol_id', 'div_id', 'uni_id', 'creador_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTable(): mixed
    {
        //ordenar fecha
        $usuarios = User::get();
        // dd($focos->id);

        return DataTables::of($usuarios)
            ->addIndexColumn()
            ->addColumn('rol', function ($usuarios) {
                $rol = Rol::where('id', $usuarios->rol_id)->first();
                return $rol->rol;
            })
            ->addColumn('division', function ($usuarios) {
                $div = Divisiones::where('id', $usuarios->div_id)->first();
                if($div->id == 1){
                    return 'TODOS';
                }else{
                    return $div->nombre;
                }
            })
            ->addColumn('unidad', function ($usuarios) {
                $uni = Unidades::where('id', $usuarios->uni_id)->first();
                if($uni->id == 1){
                    return 'TODOS';
                }else{
                    return $uni->nombre;
                }
            })
            ->editColumn('detalles', function ($usuarios) {
                return '<a href="' . route('register.show', $usuarios->id) . '"  class="btn btn-outline-info btn-xs"><i class="fa fa-bars"></i> Detalles</a>';
            })
            ->rawColumns(['rol', 'detalles', 'division', 'unidad'])
            ->toJson();
    }
}
