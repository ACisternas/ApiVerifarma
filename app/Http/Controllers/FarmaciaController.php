<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmacia;
use App\Http\Requests\FarmaciaCreateRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class FarmaciaController extends Controller
{
    /**
     * Crear farmacia.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function create(FarmaciaCreateRequest $request)
    {
        try{
            $farmacia = Farmacia::create($request->validated());
            return response()->json([
                'message'		 	=> 	'Farmacia creada correctamente.',
                'farmacia' 			=> 	$farmacia,
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json(['Error al crear farmacia: '=>$th->getMessage()], 500);
        }
    }

    /**
     * getFarmacia.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
    */
    public function getFarmaciaById($id)
    {
        try{
            $farmacia = Farmacia::find($id);
            if($farmacia){
                return response()->json(['farmacia'=>$farmacia], 200);
            }
            return response()->json(['message'=>'Farmacia no encontrada, intente con otro id.'], 404);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return response()->json(['Error al obtener farmacia: '=>$th->getMessage()], 500);
        }
    }

    /**
     * getFarmaciaCercana.
     *
     * @param  $lat, $lon
     * @return \Illuminate\Http\Response
    */
    public function getFarmaciaCercana($lat, $lon)
    {
        try {
            $farmacias = Farmacia::all();
            $farmaciaMasCercana = $farmacias[0];
            $distanciaMinima = $this->calcularDistancia($lat, $lon, Farmacia::first()->latitud, Farmacia::first()->longitud);

            foreach ($farmacias as $f) {

                $distancia = $this->calcularDistancia($lat, $lon, $f->latitud, $f->longitud);
                if ($distancia < $distanciaMinima) {
                    $distanciaMinima = $distancia;
                    $farmaciaMasCercana = $f;
                }
            }
            return response()->json(['Farmacia mas cercana'=>$farmaciaMasCercana], 200);
            //return  response()->json(['Farmacia mas cercana'=>$distanciaMinima], 200);
        } catch (\Throwable $th) {
            return response()->json(['message'=> 'Error al obtener farmacias: '.$th->getMessage()], 500);
            Log::debug($th->getMessage());
        }
    }

    private function calcularDistancia($lat0, $lon0, $lat1, $lon1)
    {
        //Transformo a radianes;
        $rlat0 = deg2rad($lat0);
        $rlon0 = deg2rad($lon0);
        $rlatF = deg2rad($lat1);
        $rlonF = deg2rad($lon1);

        //diferencia entre estos valores
        $latDelta = $rlatF - $rlat0;
        $lonDelta = $rlonF - $rlon0;

        //finalmente calculo la distancia en kilometros
        $distanciaKm = (6371 * acos(cos($rlat0) * cos($rlatF) * cos($lonDelta) + sin($rlat0) * sin($rlatF)));

        return $distanciaKm;
    }

}
