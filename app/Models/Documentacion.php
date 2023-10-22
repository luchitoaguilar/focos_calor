<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Documentacion extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'documentacion';

    /**
     * @var string[]
     */
    protected $fillable = [
        'descripcion', 'tipo', 'fecha', 'archivo',
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

     /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTable(): mixed
    {
        //ordenar fecha
        $documentacion = Documentacion::orderBy('fecha', 'asc')->get();
        // dd($focos->id);

        return DataTables::of($documentacion)
        // ->editColumn('detalles', function ($documentacion) {
        //     return '<a href="' . route('documentacion.show', $documentacion->id) . '"  class="btn btn-outline-info btn-xs"><i class="fa fa-bars"></i> Detalles</a>';
        // })
        ->editColumn('detalles', function ($documentacion) {
            $button = '<a href="' . route('documentacion.show', $documentacion->id) . '" class="btn btn-primary btn-sm tooltipsC"
                aria-hidden="true" title="Detalles">
                <i class="fa fa-bars"></i>
              </a>';

            if (auth()->user()->rol_id == 1) {
                $button .= '<form action="' . route('documentacion.eliminar', $documentacion->id)  . '" class="d-inline"
            method="POST">'
                    . csrf_field() . method_field("delete") . '
            <button type="submit" id="delete-user" class="btn btn-danger btn-sm tooltipsC  confirm-button" aria-hidden="true"
              title="Eliminar este registro"><i class="fa fa-trash"></i>
            </button>
            </form>';
            }
            return $button;
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }

     /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTablePon(): mixed
    {
        //ordenar fecha
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'PLANES');
        // dd($focos->id);

        return DataTables::of($documentacion)
        ->editColumn('detalles', function ($documentacion) {
            return '    <a href="' . asset($documentacion->archivo) . '" download="' . asset($documentacion->archivo) . '"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }

     /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTableNva(): mixed
    {
        //ordenar fecha
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'BASES LEGALES Y RESOLUCIONES');
        // dd($focos->id);

        return DataTables::of($documentacion)
        ->editColumn('detalles', function ($documentacion) {
            return '    <a href="' . asset($documentacion->archivo) . '" download="' . asset($documentacion->archivo) . '"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }

     /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTableNs(): mixed
    {
        //ordenar fecha
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'NN.VV.AA. y NN.SS.');
        // dd($focos->id);

        return DataTables::of($documentacion)
        ->editColumn('detalles', function ($documentacion) {
            return '    <a href="' . asset($documentacion->archivo) . '" download="' . asset($documentacion->archivo) . '"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }

     /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTableBoletines(): mixed
    {
        //ordenar fecha
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'BOLETINES');
        // dd($focos->id);

        return DataTables::of($documentacion)
        ->editColumn('detalles', function ($documentacion) {
            return '    <a href="' . asset($documentacion->archivo) . '" download="' . asset($documentacion->archivo) . '"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }

       /**
     * @return mixed
     * @throws Exception
     */
    public static function dataTableForm(): mixed
    {
        //ordenar fecha
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'FORMULARIOS');
        // dd($focos->id);

        return DataTables::of($documentacion)
        ->editColumn('detalles', function ($documentacion) {
            return '    <a href="' . asset($documentacion->archivo) . '" download="' . asset($documentacion->archivo) . '"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }
}
