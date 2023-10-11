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
        ->editColumn('detalles', function ($documentacion) {
            return '<a href="' . route('documentacion.show', $documentacion->id) . '"  class="btn btn-outline-info btn-xs"><i class="fa fa-bars"></i> Detalles</a>';
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
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'PON');
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
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'NNVVAA');
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
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'NNSS');
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
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'Boletines');
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
        $documentacion = Documentacion::orderBy('fecha', 'asc')->where('tipo', 'Formulario');
        // dd($focos->id);

        return DataTables::of($documentacion)
        ->editColumn('detalles', function ($documentacion) {
            return '    <a href="' . asset($documentacion->archivo) . '" download="' . asset($documentacion->archivo) . '"><i class="fa fa-file-pdf-o fa-3x" aria-hidden="true"></i></a>';
        })
        ->rawColumns(['detalles'])
            ->toJson();
    }
}
