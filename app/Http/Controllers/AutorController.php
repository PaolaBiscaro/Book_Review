<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AutorService;
use Illuminate\Http\JsonResponse;

class AutorController extends Controller
{
    private AutorService $autorService;

    public function __construct(AutorService $autorService){
        $this->autorService = $autorService;
    }

    public function get(){
        $autores = $this->autorService->get();

        return response()->json($autores);
    }

    public function store(Request $request){
        $data = $request->all();
        $autor = $this->autorService->store($data);

        return response()->json($autor);
    }

    public function details(int $id){
        $autor = $this->autorService->details($id);

        return response()->json($autor);
    }


    public function update(int $id, Request $request){
        $data = $request->all();
        $autor = $this->autorService->update($id, $data);

        return response()->json($autor);
    }

    public function delete($id){
        $autor = $this->autorService->delete($id);

        return response()->json($autor);

    }

}
