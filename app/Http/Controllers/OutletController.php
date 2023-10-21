<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestOutlet;
use App\Models\Divisiones;
use App\Models\Outlet;
use App\Models\Unidades;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades;
use RealRashid\SweetAlert\Facades\Alert;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $this->authorize('manage_outlet');

        return Outlet::dataTable();
    }

    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function ver_datos($id)
    {

        $outlet = Outlet::findOrFail($id);

        return $outlet;
    }

    /**
     * Display a listing of the outlet.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('manage_outlet');

        $outletQuery = Outlet::where('name', 'like', '%' . request('q') . '%');
        $outlets = $outletQuery->paginate(25);

        return view('outlets.index', compact('outlets'));
    }

    /**
     * Display the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function activar($id)
    {
        $this->authorize('manage_outlet');

        $outlet = Outlet::findOrFail($id);
        // $outlet->fill($outlet->all());
        // dd($outlet->activo );

        if ($outlet->activo == 1) {
            // $title = 'Inactivar Foco!';
            // $text = "Seguro que quiere desactivar este Foco?";
            // confirmDelete($title, $text);

            $outlet->activo = 0;
            $outlet->save();
            toast('Estado Inactivado correctamente','success');
        } else {
            $outlet->activo = 1;
            $outlet->save();
            toast('Estado Activado correctamente','success');
        }

        $outletQuery = Outlet::where('name', 'like', '%' . request('q') . '%');
        $outlets = $outletQuery->paginate(25);


        return view('outlets.index', compact('outlets'));
    }

    /**
     * Show the form for creating a new outlet.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', new Outlet);

        $divisiones = Divisiones::get()->except(1);
        $unidades = Unidades::get()->except(1);
        // dd($unidades);
        return view('outlets.create', compact('divisiones', 'unidades'));
    }

    /**
     * Store a newly created outlet in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->authorize('create', new Outlet);

        // Almacenamiento de la imagen.
        if ($request->file('foto')) {
            $file = $request->file('foto');

            $nombres = 'foto_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/fotos/';

            $file->move($paths, $nombres);

            $direccion_foto = $paths . $nombres;
        } else {
            $direccion_foto = "/assets/fotos/foto_default.pdf";
        }
        // Almacenamiento del video.
        if ($request->file('video')) {
            $file = $request->file('video');

            $nombres = 'video_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/videos/';

            $file->move($paths, $nombres);

            $direccion_video = $paths . $nombres;
        } else {
            $direccion_video = "/assets/videos/video_default.pdf";
        }
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
        //Almacenamiento del resumen ejecutivo
        if ($request->file('resumen')) {
            $file = $request->file('resumen');

            $nombres = 'resumen_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/resumen/';

            $file->move($paths, $nombres);

            $direccion_resumen = $paths . $nombres;
        } else {
            $direccion_resumen = "/assets/resumen/resumen_default.pdf";
        }

        $outlet = new Outlet($request->all());
        //dd($outlet);
        $outlet->foto = $direccion_foto;
        $outlet->video = $direccion_video;
        $outlet->archivo = $direccion_archivo;
        $outlet->resumen = $direccion_resumen;
        $outlet->division = $request->division;
        $outlet->unidad = $request->unidad;

        // $outlet->lugar_nacimiento_id = $request->lugar_nacimiento_id;
        // $outlet->fecha_nacimiento = $request->fecha_nacimiento;
        // $outlet->ci = $request->ci;
        // $outlet->complemento = $request->complemento;
        // $outlet->expedido_id = $request->expedido_id;
        // $outlet->telefono = $request->telefono;
        $outlet->creador_id = auth()->id();

        $outlet->save();

        return redirect()->route('outlets.show', $outlet);
    }

    /**
     * Display the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function show(Outlet $outlet)
    {
        return view('outlets.show', compact('outlet'));
    }

    /**
     * Show the form for editing the specified outlet.
     *
     * @param  \App\Outlet  $outlet
     * @return \Illuminate\View\View
     */
    public function edit(Outlet $outlet)
    {
        $this->authorize('update', $outlet);

        $divisiones = Divisiones::get()->except(1);
        $unidades = Unidades::get();

        return view('outlets.edit', compact('outlet', 'divisiones', 'unidades'));
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

        $outlet = Outlet::find($request->id);

        $outlet->fill($request->all());

        if ($request->file('foto')) {
            $file = $request->file('foto');

            $nombres = 'foto_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/fotos/';

            $file->move($paths, $nombres);

            $outlet->foto = $paths . $nombres;
        } else {
            if ($outlet->foto != '/assets/fotos/foto_default.png') {
                $direccion_foto = $outlet->foto;
            } else {
                $direccion_foto = "/assets/fotos/foto_default.png";
            }
        }

        if ($request->file('video')) {
            $file = $request->file('video');

            $nombres = 'video_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/videos/';

            $file->move($paths, $nombres);

            $outlet->video = $paths . $nombres;
        } else {
            if ($outlet->video != '/assets/videos/video_default.png') {
                $direccion_video = $outlet->video;
            } else {
                $direccion_video = "/assets/videos/video_default.png";
            }
        }


        if ($request->file('archivo')) {
            $file = $request->file('archivo');

            $nombres = 'archivo_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/archivos/';

            $file->move($paths, $nombres);

            $direccion_archivo = $paths . $nombres;
        } else {
            if ($outlet->archivo != '/assets/archivos/archivo_default.png') {
                $direccion_archivo = $outlet->archivo;
            } else {
                $direccion_archivo = "/assets/banner/images/banner_fondo_default.png";
            }
        }

        if ($request->file('resumen')) {
            $file = $request->file('resumen');

            $nombres = 'resumen_' . time() . '.' . $file->getClientOriginalExtension();

            $paths = 'assets/resumen/';

            $file->move($paths, $nombres);

            $direccion_resumen = $paths . $nombres;
        } else {
            if ($outlet->resumen != '/assets/resumen/resumen_default.png') {
                $direccion_resumen = $outlet->resumen;
            } else {
                $direccion_resumen = "/assets/banner/images/banner_fondo_default.png";
            }
        }

        $outlet->creador_id = auth()->id();
        $outlet->archivo = $direccion_archivo;
        $outlet->resumen = $direccion_resumen;
        //  dd($outlet);
        $outlet->save();

        // $outlet->update($outletData);

        return redirect()->route('outlets.show', $outlet);
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
        $foco = Outlet::find($request->id);

        $foco->eliminar = 0;

        $foco->save();

        // if ($request->get('outlet_id') == $outlet->id && $outlet->delete()) {
            return redirect()->route('outlets.index');
        // }

        // return back();
    }
}
