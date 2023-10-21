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
            ->editColumn('detalles', function ($user) {
                $button = '<a href="' . route('register.show', $user->id) . '" class="btn btn-primary btn-sm tooltipsC"
                    aria-hidden="true" title="Detalles">
                    <i class="fa fa-bars"></i>
                  </a>';
    
                if (auth()->user()->rol_id == 1) {
                    $button .= '<form action="' . route('register.eliminar', $user->id)  . '" class="d-inline"
                method="POST">'
                        . csrf_field() . method_field("delete") . '
                <button type="submit" id="delete-user" class="btn btn-danger btn-sm tooltipsC  confirm-button" aria-hidden="true"
                  title="Eliminar este registro"><i class="fa fa-trash"></i>
                </button>
                </form>';
                }
                return $button;
            })
            ->rawColumns(['rol', 'detalles', 'division', 'unidad'])
            ->toJson();
    }
}
