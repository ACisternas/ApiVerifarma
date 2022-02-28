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
     * Store a newly created resource in storage.
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
     * Show.
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

}
