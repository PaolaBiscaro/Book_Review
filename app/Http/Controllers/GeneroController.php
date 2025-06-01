<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GeneroService;
use Illuminate\Http\JsonResponse;

class GeneroController extends Controller
{
    private GeneroService $generoService;

    public function __construct(GeneroService $generoService){
        $this->generoService = $generoService;
    }

    public function get(){
        $generos = $this->generoService->get();

        return response()->json($generos);
    }

    public function store(Request $request){
        $data = $request->all();
        $genero = $this->generoService->store($data);

        return response()->json($genero);
    }

    public function details(int $id){
        $genero = $this->generoService->details($id);

        return response()->json($genero);
    }


    public function update(int $id, Request $request){
        $data = $request->all();
        $genero = $this->generoService->update($id, $data);

        return response()->json($genero);
    }

    public function delete($id){
        $genero = $this->generoService->delete($id);

        return response()->json($genero);

    }
}

