<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Unidades;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Show the form for creating a new outlet.
     *
     * @return \Illuminate\View\View
     */
    public function unidades($dependencia)
    {
        // $this->authorize('create', new Outlet);

        $unidades = Unidades::where('dependencia', $dependencia)->get();
        // dd($unidades);
        return with(["unidades" => $unidades]);
    }

}
