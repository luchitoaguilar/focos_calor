<?php

namespace App\Http\Controllers\Api;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Outlet as OutletResource;

class OutletController extends Controller
{
    /**
     * Get outlet listing on Leaflet JS geoJSON data structure.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $outlets = Outlet::where('activo', 1)->where('eliminar', 1)->get();

        $geoJSONdata = $outlets->map(function ($outlet) {
            return [
                'type'       => 'Feature',
                'properties' => new OutletResource($outlet),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $outlet->longitude,
                        $outlet->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }

    /**
     * Show the outlet listing in LeafletJS map.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function divisiones(Request $request)
    {
        $DIV1 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 2)->get();
        $DIV2 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 3)->get();
        $DIV3 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 4)->get();
        $DIV4 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 5)->get();
        $DIV5 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 6)->get();
        $DIV6 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 7)->get();
        $DIV7 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 8)->get();
        $DIV8 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 9)->get();
        $DIV9 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 10)->get();
        $DIV10 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 11)->get();
        $DIVMEC1 = Outlet::where('activo', 1)->where('eliminar', 1)->where('division', 12)->get();

        // $data = $divisiones->map(function ($divisiones) {
        //     return [
        //         'DIV-1'       => $divisiones->id == 1,
        //     ];
        // });

        return response()->json([
            '1' => count($DIV1),
            '2' => count($DIV2),
            '3' => count($DIV3),
            '4' => count($DIV4),
            '5' => count($DIV5),
            '6' => count($DIV6),
            '7' => count($DIV7),
            '8' => count($DIV8),
            '9' => count($DIV9),
            '10' => count($DIV10),
            '11' => count($DIVMEC1),
        ]);
    }
}
