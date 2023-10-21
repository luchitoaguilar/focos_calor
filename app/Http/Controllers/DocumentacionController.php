<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestDocumentacion;
use App\Models\Documentacion;
use App\Models\Outlet;
use Illuminate\Http\Request;

class DocumentacionController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        return Documentacion::dataTable();
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarPon()
    {
        return Documentacion::dataTablePon();
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarNva()
    {
        return Documentacion::dataTableNva();
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarNs()
    {
        return Documentacion::dataTableNs();
    }

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarBoletines()
    {
        return Documentacion::dataTableBoletines();
    }

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarForm()
    {
        return Documentacion::dataTableForm();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documetacion
     */
    protected function index()
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::first();

        return view('documentacion.documentacion', compact('documentacion'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documetacion
     */
    protected function index_pon()
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::first();

        return view('documentacion.pon', compact('documentacion'));
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documetacion
     */
    protected function index_nva()
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::first();

        return view('documentacion.nva', compact('documentacion'));
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documetacion
     */
    protected function index_ns()
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::first();

        return view('documentacion.ns', compact('documentacion'));
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documetacion
     */
    protected function index_boletines()
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::first();

        return view('documentacion.boletines', compact('documentacion'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documetacion
     */
    protected function index_form()
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::first();

        return view('documentacion.formularios', compact('documentacion'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Documentacion
     */
    protected function show(Int $id)
    {
        $this->authorize('manage_outlet');

        $documentacion = Documentacion::findOrFail($id);

        return view('documentacion.show', compact('documentacion'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
        // $this->middleware('auth');
        $documentacion = Documentacion::get();

        return view('documentacion.create', compact('documentacion'));
        // return view('auth.register')->with("roles", $roles);
    }

    public function store(Request $request)
    {
        // dd($request);   
        $this->authorize('create', new Outlet());

        //Almacenamiento del archivo de respaldo
        if ($request->file('archivo')) {
            $file = $request->file('archivo');

            $nombres = 'archivo_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/archivos/';

            $file->move($paths, $nombres);

            $direccion_archivo = $paths . $nombres;
        } else {
            $direccion_archivo = "/assets/archivos/archivo_default.pdf";
        }

        $outlet = new Documentacion($request->all());
        //dd($outlet);
        $outlet->archivo = $direccion_archivo;
        $outlet->tipo = $request->tipo;
        $outlet->descripcion = $request->descripcion;
        $outlet->fecha = $request->fecha;

        $outlet->save();

        return redirect()->route('documentacion.show', $outlet);
    }

    /**
     * Remove the specified outlet from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function eliminar(Request $request, Outlet $outlet)
    {
        $foco = Documentacion::find($request->id)->delete();


        // if ($request->get('outlet_id') == $outlet->id && $outlet->delete()) {
            return redirect()->route('documentacion.index');
        // }

        // return back();
    }

    /**
     * Show the form for editing the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function edit(Int $id)
    {

        $documentacion = Documentacion::findOrFail($id);

        return view('documentacion.edit', compact('documentacion'));
    }

    /**
     * Update the specified outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\Routing\Redirector
     */
    public function update(Request $request, Outlet $outlets)
    {
        $this->authorize('update', $outlets);

        $documentacion = Documentacion::find($request->id);

        $documentacion->fill($request->all());
// dd($request->file('archivo'));
        if ($request->file('archivo')) {
            $file = $request->file('archivo');

            $nombres = 'archivo_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/archivos/';

            $file->move($paths, $nombres);

            $direccion_archivo = $paths . $nombres;
        } else {
            if ($documentacion->archivo != '/assets/archivos/archivo_default.png' ) {
                $direccion_archivo = $documentacion->archivo;
            } else {
                $direccion_archivo = "/assets/archivos/archivo_default.png";
            }
        }
       

        $documentacion->archivo = $direccion_archivo;
//  dd($documentacion);
        $documentacion->save();

        return redirect()->route('documentacion.show', $documentacion);
    }
}
