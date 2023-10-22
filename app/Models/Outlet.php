<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Unique;
use Yajra\DataTables\DataTables;


class Outlet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'descripcion', 'latitude', 'longitude', 'rrhh', 'rr_log', 'division', 'unidad', 'nivel', 'resumen',
        'acciones', 'apoyo', 'efectivo', 'fecha', 'foto', 'video', 'archivo', 'activo', 'creador_id', 'encargado', 'unidad_apoyo',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('outlet.outlet'),
        ]);
        $link = '<a href="' . route('outlets.show', $this) . '"';
        $link .= ' title="' . $title . '">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get outlet coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ', ' . $this->longitude;
        }
    }

    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        dd($this->unidad);
        $division = Divisiones::where('id', $this->division)->first();
        $unidad = Unidades::where('dependencia', $this->unidad)->first();

        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.name') . ':</strong><br>' . $this->name_link . '</div>';
        $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.coordinate') . ':</strong><br>' . $this->coordinate . '</div>';
        $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.division') . ':</strong><br>' . $division['nombre'] . '</div>';
        $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.division') . ':</strong><br>' . $unidad['nombre'] . '</div>';
        if ($this->nivel == 'Rojo') {
            $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.nivel') . ':</strong><br><div class="alert alert-danger" role="alert">' . $this->nivel . '</div></div>';
        } elseif ($this->nivel == 'Amarillo') {
            $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.nivel') . ':</strong><br><div class="alert alert-warning" role="alert">' . $this->nivel . '</div></div>';
        } elseif ($this->nivel == 'Verde') {
            $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.nivel') . ':</strong><br><div class="alert alert-success" role="alert">' . $this->nivel . '</div></div>';
        }
        $mapPopupContent .= '<div class="my-2"><strong>' . __('outlet.unidad_apoyo') . ':</strong><br><img src="' . asset('assets/' . $this->unidad_apoyo . '.jpeg') . '"  width="60" height="50" /></div>';


        return $mapPopupContent;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTable(): mixed
    {
        //ordenar fecha
        $focos = Outlet::orderBy('fecha', 'desc')->where('eliminar', '!=', 0)->get();

        return DataTables::of($focos)
            ->addIndexColumn()
            ->addColumn('division', function ($focos) {
                $division = Divisiones::where('id', $focos->division)->first();
                return $division->nombre;
            })
            ->addColumn('unidad', function ($focos) {
                $unidad = Unidades::where('id', $focos->unidad)->first();
                return $unidad->nombre;
            })
            ->addColumn('nivel', function ($focos) {
                if ($focos->nivel == 'Rojo') {
                    return '<div class="d-flex justify-content-center"><button type="button" class="btn bg-danger btn-flat margin disabled">Rojo</button></div>';
                } elseif (($focos->nivel == 'Amarillo')) {
                    return '<div class="d-flex justify-content-center"><button type="button" class="btn bg-warning btn-flat margin disabled" style="text-align:center;display:block">Amarillo</button></div>';
                } elseif (($focos->nivel == 'Verde')) {
                    return '<div class="d-flex justify-content-center"><button type="button" class="btn bg-success btn-flat margin disabled" style="text-align:center;display:block">Verde</button></div>';
                }
            })
            ->addColumn('estado', function ($focos) {
                if ($focos->activo == true) {
                    return '<a href="' . route('outlets.activar', $focos->id) . '" class="btn bg-success btn-flat margin" id="activar" name="activar"><i class="fa fa-check"></i> Activo</a>';
                } else {
                    return '<a href="' . route('outlets.activar', $focos->id) . '" class="btn bg-warning btn-flat margin" id="desactivar" name="desactivar"><i class="fa fa-close"></i> Inactivo</a>';
                }
            })
            ->editColumn('detalles', function ($focos) {
                $button = '<a href="' . route('outlets.show', $focos->id) . '" class="btn btn-primary btn-sm tooltipsC"
                    aria-hidden="true" title="Detalles">
                    <i class="fa fa-bars"></i>
                  </a>';

                if (auth()->user()->rol_id == 1) {
                    $button .= '<form action="' . route('outlets.eliminar', $focos->id)  . '" class="d-inline form-eliminar"
                method="POST">'
                        . csrf_field() . method_field("delete") . '
                <button type="submit" class="btn btn-danger btn-sm tooltipsC" aria-hidden="true"
                  title="Eliminar este registro"><i class="fa fa-trash"></i>
                </button>
                </form>';
                }
                return $button;

                // return '<a href="' . route('outlets.show', $focos->id) . '" class="btn btn-outline-info btn-xs"><i class="fa fa-bars"></i> Detalles</a>
                //         <a href="' . route('outlet.eliminar', $focos->id) . '" class="btn btn-outline-danger btn-xs"><i class="fa fa-trash"></i> Eliminar</a>';
            })
            ->rawColumns(['action', 'estado', 'detalles', 'nivel', 'division', 'unidad'])
            ->toJson();
    }
}
